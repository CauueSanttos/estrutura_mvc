<?php
/**
 * Controller Padrão da Estrutura
 * @author Cauê dos Santos Silva <cauedossantossilva@hotmail.com>
 * @since 03/01/2019
 */
class ControllerPadrao {

    public function montaTela(){
        $this->getInstanceTela('home');
    }

    public function getInstanceTela($sNomeView, $aParametrosView = Array()){
        Factory::loadView($sNomeView, $aParametrosView);
    }
    
}