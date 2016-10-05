<?php

namespace HeringBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use HeringBundle\Entity\Caixa;

class DefaultController extends Controller {

    /**
     * @Route("/")
     */
    public function indexAction() {
        return $this->render('HeringBundle:Default:index.html.twig');
    }

    /**
     * @Route("/pdv",name="frente_caixa")
     */
    public function pdvAction(Request $request) {
        $caixa = new Caixa();
        $caixa->setData(new \DateTime());
        $caixa->setStatus("ABERTO");
        $caixa->setUsuario('Teste');
        $caixa->setTotalPago(0);

        $em = $this->getDoctrine()->getManager();
        $em->persist($caixa);
        $em->flush();
        $em->refresh($caixa);
        
        $request->getSession()->set('caixa_id',$caixa->getId());
       
        return $this->render('HeringBundle:Caixa:caixa.html.twig');
    }

}
