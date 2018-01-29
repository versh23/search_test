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
        //Серивс поиска
        $finder = $this->get('versh_sphinx.finder.place');


        $text = 'оао';

        $builder = $finder->createBuilder();
        $builder->match($text);


        $res1 = $finder->findText($text);
        $res2 = $finder->find($builder);

        $res3 = $finder->findTextPaginated($text);
        $res4 = $finder->findPaginated($builder);

        dump($res1, $res2, $res3, $res4);die;

        return new Response('Welcome to your new controller!');
    }
}
