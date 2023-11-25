<?php

namespace App\Controller\Admin;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminPropertyController extends AbstractController
{
    private $repository;
    public function __construct(PropertyRepository $repository){
        $this->repository = $repository;
    }

    /**
     * @Route("/admin/admin/property", name="admin")
     */
    public function index(): Response
    {   
        $properties = $this->repository->findAll();
        return $this->render('admin/admin_property/index.html.twig',compact('properties'));
    }
    
    /**
     * @Route("/admin/admin/property", name="admin")
     */
    public function create(Property $property): Response{
        return $this->render('admin/admin_property/edit.html.twig',compact('property'));
    }
}
