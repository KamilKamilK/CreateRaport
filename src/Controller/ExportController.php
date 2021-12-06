<?php

namespace App\Controller;

use App\Form\ExportType;
use App\Repository\ExportRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class ExportController extends AbstractController
{
    /**
     * @var Environment
     */
    private $twig;
    /**
     * @var ExportRepository
     */
    private $exportRepository;

    /**
     * @var FormFactoryInterface
     */
    private $formfactory;

    public function __construct(
        ExportRepository $exportRepository,
        Environment      $twig,
        FormFactoryInterface $formfactory
    )

    {
        $this->twig = $twig;
        $this->exportRepository = $exportRepository;
        $this->formfactory = $formfactory;
    }

    /**
     * @Route("/", name="export")
     */
    public function index(Request $request)
    {
        $form = $this->formfactory->create(ExportType::class);
        $form->handleRequest($request);

        $formParameters= $form->getData();

        if($form->isSubmitted() && $form->isValid()){
            $sortedExports = $this->exportRepository->findDateByParameters(
                $formParameters['Lokal:']->name,
                $formParameters['Od:']->format('Y-m-d'),
                $formParameters['Do:']->format('Y-m-d')
            );
        }
        $exports = $this->exportRepository->findAll();
        $html = $this->twig->render('export/index.html.twig', [
            'exports' => $exports,
            'sortedExports' => $sortedExports,
            'form' => $form->createView()
        ]);
        return new Response($html);
    }
}
