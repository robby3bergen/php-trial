<?php
/**
 * Created by PhpStorm.
 * User: robby
 * Date: 8-2-2019
 * Time: 14:18
 */

namespace App\Controller;


use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HomepageController extends AbstractController
{
    /**
     * @Route("/", name="homepage", methods={"GET"})
     */

    public function home() {
        return $this->render('home.html.twig', ['title' => 'This is my homepage']);
    }

    /**
     * @Route("/lid-worden", name="lid_worden", methods={"GET"})
     */

    public function subscribe() {
        $test = 'print this before any other html';
        echo $test;

        return $this->render('lid_worden.html.twig');
    }
}