<?php
/**
 * Controller Padrão da Estrutura
 * @author Cauê dos Santos Silva <cauedossantossilva@hotmail.com>
 * @since 03/01/2019
 */
class ControllerPadrao {

    /**
     * Método que inicia a montagem da tela.
     */
    public function montaTela(){
        $this->getInstanceTela('home');
        $this->getInstanceTemplate('home');
    }

    /**
     * Carrega a View da aplicação.
     * @param type $sNomeView
     * @param type $aParametrosView
     */
    public function getInstanceTela($sNomeView, $aParametrosView = Array()){
        Factory::loadView($sNomeView, $aParametrosView);
    }

    public function getInstanceTemplate($sNomeTemplate, $aArguments = Array()){
        Factory::loadTemplate($sNomeTemplate, $aArguments);
    }
    
}