<?php

namespace App\Form;

use App\Entity\Logement;
use App\Entity\TypeLogement;
use App\Entity\Photo;
use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use App\Entity\Ville;

class LogementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id_type', EntityType::class, array(
                'attr' => array(
                    'class' => 'form-control'
                ),
                'label' => 'Type de logement',
                'class' => TypeLogement::class,
                'choice_label' => 'type'
            ))
            ->add('nom', TextType::class, array(
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('description', TextareaType::class, array(
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('adresse', TextType::class, array(
                'attr' => array(
                    'class' => 'form-control'
                ),
                'label' => 'Adresse'
            ))
            ->add('codePostal', TextType::class, array(
                'attr' => array(
                    'class' => 'form-control'
                ),
                'label' => 'Code Postal'
            ))
            /*->add('ville', TextType::class, array(
                'attr' => array(
                    'class' => 'form-control'
                )
            ))*/
            ->add('prix', MoneyType::class, array(
                'attr' => array(
                    'class' => 'form-control'
                ),
                'label' => 'Prix / nuit (en euros)'
            ))
            ->add('nbPersonne', NumberType::class, array(
                'attr' => array(
                    'class' => 'form-control'
                ),
                'label' => 'Nombre de personne'
            ))
            ->add('photosUploads', FileType::class, array(
                'attr' => array(
                    'class' => 'form-control-file'
                ),
                'multiple' => true,                
                'label' => 'Prises de vue'
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Logement::class,
        ]);
    }
}
