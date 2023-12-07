<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\VisiteRepository;
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
     * @param type $champ
     * @param type $ordre
     * @return Response
     */
    public function sort($champ, $ordre): Response{
        $visites = $this->repository->findAllOrderBy($champ, $ordre);
        return $this->render("pages/voyages.html.twig", ['visites' => $visites]);
    }
}
