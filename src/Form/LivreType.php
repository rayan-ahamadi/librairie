<?php

namespace App\Form;

use App\Entity\Livre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class LivreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('ISBN', TextType::class, ['required' => true,])
            ->add('Titre_livre')
            ->add('theme_livre')
            ->add('nbr_pages_livre')
            ->add('Format_livre')
            ->add('Nom_auteur')
            ->add('Prenom_auteur')
            ->add('Editeur')
            ->add('annee_edition')
            ->add('prix_vente')
            ->add('Langue_livre')
            ->add('Enregistrer', SubmitType::class) ;
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Livre::class,
        ]);
    }
}
