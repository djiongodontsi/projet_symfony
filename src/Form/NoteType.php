<?php

namespace App\Form;

use App\Entity\Eleve;
use App\Entity\Note;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NoteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('valeur_note')
            ->add('coefficient')
            ->add('date')
            ->add('eleve', EntityType::class, [
                'class' => Eleve::class,
                'choice_label' => fn (Eleve $eleve) => $eleve->getPrenom().' '.$eleve->getNom(),
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Note::class,
        ]);
    }
}
