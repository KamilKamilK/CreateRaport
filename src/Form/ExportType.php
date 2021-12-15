<?php

namespace App\Form;

use App\Repository\ExportRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class ExportType extends AbstractType
{
    private $locals;

    public function __construct(ExportRepository $exportRepository)
    {
        $this->locals = $exportRepository->findAll();
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $placeNames = array();
        foreach ($this->locals as $key => $local) {
            $name = $local->getPlaceName();
            array_push($placeNames, $name);


            $builder->add('Lokal:', ChoiceType::class, [
                'choices' =>$this->locals
            ])
                ->add('Od:', DateType::class, [
                    'widget' => 'single_text',
                    'format' => 'yyyy-MM-dd',
                    'data' => new \DateTime(),
                ])
                ->add('Do:', DateType::class, [
                    'widget' => 'single_text',
                    'format' => 'yyyy-MM-dd',
                    'data' => new \DateTime(),
                ])
                ->add('Zatwierdz', SubmitType::class);
        }
    }

}