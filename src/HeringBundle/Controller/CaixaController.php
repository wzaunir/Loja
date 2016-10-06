<?php

namespace HeringBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use HeringBundle\Entity\Caixa;
use HeringBundle\Entity\CaixaItem;

/**
 * Caixa controller.
 *
 * @Route("/caixa")
 */
class CaixaController extends Controller {

    /**
     * Lists all Caixa entities.
     *
     * @Route("/", name="caixa_index")
     * @Method("GET")
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $caixas = $em->getRepository('HeringBundle:Caixa')->findAll();

        return $this->render('HeringBundle:Caixa:index.html.twig', array(
                    'caixas' => $caixas,
        ));
    }

    /**
     * Finds and displays a Caixa entity.
     *
     * @Route("/{id}", name="caixa_show")
     * @Method("GET")
     */
    public function showAction(Caixa $caixa) {

        return $this->render('HeringBundle:Caixa:show.html.twig', array(
                    'caixa' => $caixa,
        ));
    }


    /**
     * Estonar um ou mais itens adicionados no carrinho
     * @Route("/estorno/{numero}", name="caixa_estorno")
     * @Method("GET")
     * @param Request $request
     */
    public function estornoAction(Request $request, $numero) {
        
        $em = $this->getDoctrine()->getManager();
        $caixaId = $request->getSession()->get('caixa_id');
        
        $caixa = $em->getRepository('HeringBundle:Caixa')->find($caixaId);
        $itens = $caixa->getItens();
        
        return $this->json($itens->toArray());
    }

    /**
     * Finalizar a compra e baixa estoque
     * @Route("/finalizar", name="caixa_finalizar")
     * @Method("GET")
     * @param Request $request
     */
    public function finalizarAction(Request $request) {
              
    }


}
