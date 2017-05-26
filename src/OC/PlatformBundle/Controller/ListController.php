<?php
/**
 * Created by PhpStorm.
 * User: benoitH
 * Date: 25/08/16
 * Time: 15:14
 */

namespace OC\PlatformBundle\Controller;

use OC\PlatformBundle\Entity\Arbitre;
use OC\PlatformBundle\Entity\Club;
use OC\PlatformBundle\Entity\Coach;
use OC\PlatformBundle\Entity\Comite;
use OC\PlatformBundle\Entity\Equipe;
use OC\PlatformBundle\Entity\Joueur;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class ListController extends Controller
{



    public function viewObjetsAction($nameObjets)
    {
        $nameObjets =  strtoupper( substr($nameObjets,0,1)).substr($nameObjets,1,strlen($nameObjets)) ;
        $nameObjet =substr($nameObjets,0 , strlen($nameObjets)-1);

        $em = $this->getDoctrine()->getManager();
        $objets = $em->getRepository('OCPlatformBundle:'.$nameObjet)->findAll();
        return $this->render('OCPlatformBundle:'.$nameObjet.':'.strtolower($nameObjets).'.html.twig', array(strtolower($nameObjets)=>$objets)) ;
    }


    public function viewObjetAction($id,$nameObjet,Request $request)
    {

        $disabled = true ;
        return $this->viewEdit($id,  $request,$nameObjet, $disabled);

    }


    public function deleteObjetAction(Request $request, $id,$nameObjet)
    {

        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            // Sinon on déclenche une exception « Accès interdit »
            throw new AccessDeniedException('Accès limité aux auteurs.');
        }

        $nameObjet =  strtoupper( substr($nameObjet,0,1)).substr($nameObjet,1,strlen($nameObjet)) ;
        $nameObjets = $nameObjet . 's';
        $em = $this->getDoctrine()->getManager();
        $objet = $em->getRepository('OCPlatformBundle:'.$nameObjet)->find($id);

        if (null === $objet) {
            throw new NotFoundHttpException("l'id " . $id . " n'existe pas.");
        }

        // On crée un formulaire vide, qui ne contiendra que le champ CSRF
        // Cela permet de protéger la suppression d'annonce contre cette faille
        $form = $this->get('form.factory')->create();

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em->remove($objet);
            $em->flush();

            $request->getSession()->getFlashBag()->add('info', "L'objet a bien été supprimée.");

            return $this->redirectToRoute('oc_platform_views', array('nameObjets'=>strtolower($nameObjets)));
        }

        return $this->render('OCPlatformBundle::delete.html.twig', array(
            'objet' => $objet,
            'objetName'=>strtolower($nameObjet),
            'form'   => $form->createView(),
        ));
    }


    public function addObjetAction(Request $request,$nameObjet, $idClub=NULL)
    {

        if (!$this->get('security.authorization_checker')->isGranted('ROLE_AUTEUR')) {
            // Sinon on déclenche une exception « Accès interdit »
            throw new AccessDeniedException('Accès limité aux auteurs.');
        }

        $nameObjets = $nameObjet . 's';

        $disabled = false ;
        $objet = NULL;
        $formBuilder= NULL;
        if( $nameObjet=='club')
        {
            $objet = new Club();
            $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $objet);
            $formBuilder = ClubController::formBuilder( $disabled,$formBuilder);
        }
        elseif( $nameObjet=='equipe')
        {
            $objet = new Equipe();
            $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $objet);
            $formBuilder = EquipeController::formBuilder( $disabled,$formBuilder);
        }
        elseif( $nameObjet=='coach')
        {
            $objet = new Coach();
            $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $objet);
            $formBuilder = CoachController::formBuilder( $disabled,$formBuilder);
        }
        elseif( $nameObjet=='comite')
        {
            $objet = new Comite();
            $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $objet);
            $formBuilder = ComiteController::formBuilder( $disabled,$formBuilder);
        }
        elseif( $nameObjet=='joueur')
        {
            $objet = new Joueur();
            $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $objet);
            $formBuilder = JoueurController::formBuilder( $disabled,$formBuilder);
        }
        elseif( $nameObjet=='arbitre')
        {
            $objet = new Arbitre();
            $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $objet);
            $formBuilder = ArbitreController::formBuilder( $disabled,$formBuilder);
        }




        // À partir du formBuilder, on génère le formulaire
        $form = $formBuilder->getForm();

        // Si la requête est en POST
        if ($request->isMethod('POST')) {
            // On fait le lien Requête <-> Formulaire
            // À partir de maintenant, la variable $advert contient les valeurs entrées dans le formulaire par le visiteur
            $form->handleRequest($request);

            // On vérifie que les valeurs entrées sont correctes
            // (Nous verrons la validation des objets en détail dans le prochain chapitre)
            if ($form->isValid()) {
                // On enregistre notre objet $advert dans la base de données, par exemple
                $em = $this->getDoctrine()->getManager();
                $em->persist($objet);
                $em->flush();

                $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

                // On redirige vers la page de visualisation de l'annonce nouvellement créée
                return $this->redirectToRoute('oc_platform_views' , array('nameObjets'=>$nameObjets));
            }
        }


        // On passe la méthode createView() du formulaire à la vue
        // afin qu'elle puisse afficher le formulaire toute seule

        return $this->render('OCPlatformBundle::add.html.twig', array(
            'form' => $form->createView(),
        ));


    }


    public function editObjetAction($id, Request $request,$nameObjet)
    {

        if (!$this->get('security.authorization_checker')->isGranted('ROLE_AUTEUR')) {
            // Sinon on déclenche une exception « Accès interdit »
            throw new AccessDeniedException('Accès limité aux auteurs.');
        }

        $disabled = false ;
        return $this->viewEdit($id, $request,$nameObjet, $disabled);

    }

    public function viewEdit($id, Request $request,$nameObjet,$disabled)
    {
        $nameObjetM =  strtoupper( substr($nameObjet,0,1)).substr($nameObjet,1,strlen($nameObjet)) ;

        $nameObjets = $nameObjet . 's';
        $em = $this->getDoctrine()->getManager();
        $objet = $em->getRepository('OCPlatformBundle:'.$nameObjetM)->find($id);
        if (null === $objet) {
            throw new NotFoundHttpException("Le joueur d'id ".$id." n'existe pas.");
        }

        $formBuilder= NULL;

        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $objet);
        if( $nameObjet=='club')
        {


            $formBuilder = ClubController::formBuilder( $disabled,$formBuilder);
        }
        elseif( $nameObjet=='equipe')
        {
            $formBuilder = EquipeController::formBuilder( $disabled,$formBuilder);
        }
        elseif( $nameObjet=='joueur')
        {
            $formBuilder = JoueurController::formBuilder( $disabled,$formBuilder );
        }
        elseif( $nameObjet=='coach')
        {
            $formBuilder = CoachController::formBuilder( $disabled,$formBuilder);
        }
        elseif( $nameObjet=='comite')
        {
            $formBuilder = ComiteController::formBuilder( $disabled,$formBuilder);
        }
        elseif( $nameObjet=='arbitre')
        {
            $formBuilder = ArbitreController::formBuilder( $disabled,$formBuilder);
        }




        // À partir du formBuilder, on génère le formulaire
        $form = $formBuilder->getForm();

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            // Inutile de persister ici, Doctrine connait déjà notre annonce
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien modifiée.');

            return $this->redirectToRoute('oc_platform_views', array('nameObjets'=>$nameObjets));
        }

        if( $nameObjet!='club' && $nameObjet!='equipe') {
            return $this->render('OCPlatformBundle::add.html.twig', array(
                $nameObjet => $objet,
                'form' => $form->createView(),
            ));
        }
        else{
            return $this->render('OCPlatformBundle:'.$nameObjetM.':'.$nameObjet.'.html.twig', array(
                $nameObjet => $objet,
                'form' => $form->createView(),
            ));
        }
    }




}