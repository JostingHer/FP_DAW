<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlantillaController extends AbstractController
{

    /**
     * @Route("/plantilla",name= "plantilla")
     */
    public function plantilla()
    {

        return $this->render('base.html.twig');
    }
}
