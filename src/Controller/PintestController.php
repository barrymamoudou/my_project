<?php

namespace App\Controller;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Doctrine\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PintestController extends AbstractController
{   
    /**
     * @var $repository
     * 
     * ces l'injection dependance $reporsd
     */


     /**
     * @var $em 
     * 
     * ces l'injection dependance $reporsd
     */
    private $repository;
    private $em ;
    public function __construct(PropertyRepository $repository,EntityManagerInterface $em)
    {
        $this->repository=$repository;
        $this->em=$em;
        
    }
    /**
     * @Route("/biens", name="pintest")
     */
    public function index(): Response
    {
        
       
        return $this->render('pintest/index.html.twig', [
            'controller_name' => 'PintestController',
            'current_menu' => 'Pintest',

        ]);
    }

    /**
     *  @Route("/biens/{id}", name="pintest.show")
     *  @param Property property
     *
     */
     public function show($id): Response{
        
        $property=$this->repository->find($id);  
        return $this->render('pintest/show.html.twig',[
            'property' => $property,
            // 'current_menu' => 'properties',
        ]);
    }
}
