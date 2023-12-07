<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Controller;

use App\Repository\VisiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
/**
 * Description of VoyagesController
 *
 * @author joseph-nicolasyazbek
 */
class VoyagesController extends AbstractController {
     /**
     * @Route("/voyages", name="voyages")
     * @return Response
     */
    /**
     * 
     * @var VisiteRepository
     */
    private $repository;
    
    public function index() : Response{
    $visites = $this->repository->findAllOrderBy('datecreation','DESC');
    return $this->render("pages/voyages.html.twig", ['visites' => $visites]);
    
    }
    
    public function __construct(VisiteRepository $repository){
        $this->repository = $repository;
    }
    /**
     * @Route("/voyages/tri/{champs}/{ordre}", name="voyages.sort")
     * @param string $champ
     * @param string $ordre
     * @return Response
     */
    public function sort($champ, $ordre): Response{
        $visites = $this->repository->findAllOrderBy($champ, $ordre);
        return $this->render("pages/voyages.html.twig", ['visites' => $visites]);
    }
    /**
     * @Route("/voyages/recherche/{champ}",name="voyages.findallequal")
     * @param string $champ
     * @param Request $request
     * @return Response
     */ 
    public function filter($champ, Request $request): Response{
        $valeur = $request->get("recherche");
        $visites = $this->repository->findByEqualValue($champ, $valeur);
        return $this->render("pages/voyages.html.twig", ['visites' => $visites]);
    }
}
