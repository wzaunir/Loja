<?php

namespace HeringBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('HeringBundle:Default:index.html.twig');
    }
    
    /**
     * @Route("/caixa2",name="frente_caixa")
     */
    public function caixaAction()
    {
        return $this->render('HeringBundle:Default:caixa.html.twig');
    }
}
