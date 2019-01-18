<?php
/**
 * Classe que Inicia a Estrutura MVC.
 * @author Cauê dos Santos Silva <cauedossantossilva@hotmail.com>
 * @since 03/01/2019
 */
class Core{

    public function run(){
        $aUrl = '/';
        if(isset($_GET['url'])){
            $aUrl .= $_GET['url']; 
        }
        
        $aParametros = Array();
        
        if(!empty($aUrl) && $aUrl != '/'){
            $aUrl = explode('/', $aUrl);
            array_shift($aUrl);
            
            $sControllerAtual = 'Controller' . $aUrl[0];
            array_shift($aUrl);
            
            if(isset($aUrl[0]) && !empty($aUrl[0])){
                $sAcaoAtual =  $aUrl[0];
                array_shift($aUrl);
            } else {
                $sAcaoAtual = 'montaTela';
            }
            
            if(count($aUrl)){
                $aParametros = $aUrl;
            }
            
        } else {
            $sControllerAtual = 'ControllerHome';
            $sAcaoAtual       = 'montaTela';
        }
        
        $oController = new $sControllerAtual();
        call_user_func_array(array($oController, $sAcaoAtual), $aParametros);
    }
}