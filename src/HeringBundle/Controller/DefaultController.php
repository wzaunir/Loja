<?php

namespace HeringBundle\Controller;

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
    public function pdvAction() {
        $caixa = new Caixa();
        $caixa->setData(new \DateTime());
        $caixa->setStatus("ABERTO");
        $caixa->setUsuario('Teste');
        $caixa->setTotalPago(0);

        $item = new \HeringBundle\Entity\CaixaItem();
        $item->setCodigoItem(123456);
        $item->setNumeroItem(1);
        $item->setQuantidade(3);
        $item->setValor(780);

        $em = $this->getDoctrine()->getManager();
        $em->persist($caixa);
        $em->flush();
        $em->refresh($caixa);
        $item->setCaixa($caixa);
        
        $em->persist($item);
        $em->flush();
       
        return $this->render('HeringBundle:Caixa:caixa.html.twig');
    }

}
