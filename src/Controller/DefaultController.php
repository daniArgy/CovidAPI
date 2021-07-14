<?php

namespace App\Controller;

use App\Service\SynchroniceAssets;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{

    public function index(SynchroniceAssets $synchronizeAssets): Response
    {
        $synchronizeAssets();
        return $this->render('Default\index.html.twig');
    }
}