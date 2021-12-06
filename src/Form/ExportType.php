<?php

namespace App\Form;

use App\Controller\ExportController;
use App\Entity\Export;
use App\Repository\ExportRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExportType extends AbstractType
{
    private $locals;

    public function __construct(ExportRepository $exportRepository)
    {
        $this->locals = $exportRepository->findAll();
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('Lokal:', ChoiceType::class, array(
            'choices' => $this->locals,
        ))
            ->add('Od:', DateType::class)
            ->add('Do:', DateType::class)
            ->add('Zatwierdź', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
//        $resolver->setDefaults([
//            'data_class' =>
//        ]);
    }
}