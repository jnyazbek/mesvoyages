<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Description of AcceuilControler
 *
 * @author joseph-nicolasyazbek
 */
class AcceuilController extends AbstractController {
    /**
     * @Route("/", name="accueil")
     * @return Response
     */
    public function index() : Response{
        return $this->render("pages/acceuil.html.twig");
    }
}
