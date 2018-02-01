<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class TestController extends Controller
{
    /**
     * @Route("/", name="test")
     */
    public function index()
    {
        $finder = $this->get('fos_elastica.finder.app.place');


        $result = $finder->find('элект');


        dump($result);die;

        return new Response('Welcome to your new controller!');
    }
}
