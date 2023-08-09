<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Aranyasen\HL7; // HL7 factory class
use Aranyasen\HL7\MessageInfo; // If MessageInfo is used
use Aranyasen\HL7\Segment; // If Segment is used
use Aranyasen\HL7\Segments\MSH; // If MSH is used
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncode;

class MessageInfoController extends AbstractController
{
    #[Route('/MessageInfo', name: 'app_MessageInfo')]
    public function index(): JsonResponse
    {
        return $this->json([
            'MessageInfo' => 'Welcome to your new controller!',
            'path' => 'src/Controller/MessageInfoController.php',
        ]);
    }

    public function getTypeMessageInfo($MessageInfo): string
    {
        $msh = $MessageInfo->getFirstSegmentInstance("MSH");
        $typemsg= $msh->getMessageInfoType();
        $typemsg = json_encode($typemsg);
        return $typemsg;
    }
}
