<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Aranyasen\HL7; // HL7 factory class
use Aranyasen\HL7\Message; // If Message is used
use Aranyasen\HL7\Segment; // If Segment is used
use Aranyasen\HL7\Segments\MSH; // If MSH is used
use App\Controller\MessageController;


class GetRequestController extends AbstractController
{
    #[Route('/', name: 'app_get_request')]
    public function index(): Response
    {
        // dd($_POST);
        return $this->render('get_request/index.html.twig', [
            'controller_name' => 'GetRequestController',
        ]);
    }


}
