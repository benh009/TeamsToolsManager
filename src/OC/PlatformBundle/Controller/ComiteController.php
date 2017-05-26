<?php
/**
 * Created by PhpStorm.
 * User: benoitH
 * Date: 30/08/16
 * Time: 17:28
 */

namespace OC\PlatformBundle\Controller;



use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ComiteController  extends ListController
{


    public static function formBuilder($disabled, $formBuilder)
    {

        $formBuilder
            ->add('birthday',      BirthdayType::class,array('disabled' =>  $disabled ))
            ->add('firstName',     TextType::class,array('disabled' =>  $disabled ))
            ->add('lastName',    TextType::class,array('disabled' =>  $disabled ))
            ->add('email', EmailType::class,array('disabled' =>  $disabled ))
            ->add('role', TextType::class,array('disabled' =>  $disabled ))
            ->add('gsm', TextType::class,array('disabled' =>  $disabled ))
            ->add('sex', ChoiceType::class, array('disabled' =>  $disabled,'choices'=>array("Homme"=>"h", "Femme"=>"f")))
            ->add('club', EntityType::class, array('disabled' =>  $disabled,'class'=> 'OCPlatformBundle:Club', 'choice_label' => 'Name' ))
          ;

        if(!$disabled)
        {
            $formBuilder->add('save',      SubmitType::class,array('disabled' =>  $disabled ));

        }

        return $formBuilder;
    }

}