<?php
/**
 * Controller Padrão da Estrutura
 * @author Cauê dos Santos Silva <cauedossantossilva@hotmail.com>
 * @since 03/01/2019
 */
class ControllerPadrao {

    const METODO_INCLUSAO  = 'inc',
          METODO_ALTERACAO = 'alt';

    private $Model;

    public function getModel() {
        if(empty($this->Model)){
            $this->setModel($this->getModelClass());
        }
        return $this->Model;
    }

    public function setModel($Model) {
        $this->Model = $Model;
    }

    /**
     * Método que inicia a montagem da tela.
     */
    public function montaTela(){
        $this->getInstanceTela('home');
        $this->getInstanceTemplate('home');
    }

    /**
     * Carrega a View da aplicação.
     * @param String $sNomeView
     * @param Array $aParametrosView
     */
    public function getInstanceTela($sNomeView, $aParametrosView = Array()){
        Factory::loadView($sNomeView, $aParametrosView);
    }
    
    /**
     * Carrega o template atual da página. 
     * @param String $sNomeTemplate
     * @param Array $aArguments
     */
    public function getInstanceTemplate($sNomeTemplate, $aArguments = Array()){
        Factory::loadTemplate($sNomeTemplate, $aArguments);
    }

    /**
     * Método utilizado para processamento dos dados.
     * @param String $sMethod
     */
    public function processaDados($sMethod){
        if($sMethod == self::METODO_INCLUSAO){
            $this->processaDadosInclusao();
        }
        if($sMethod == self::METODO_ALTERACAO){
            $this->processaDadosAlteracao();
        }
    }

    /**
     * Retorna o Modelo de Dados da Classe atual.
     * @return Model
     */
    public function getModelClass(){
        $sNameModel = str_replace('Controller', 'Model', get_class($this));
        return new $sNameModel();
    }

    /**
     * Insere os dados de acordo com os Campos e seus Valores
     * Campos - Recebidos via Ajax diretamente da View
     * Valores - Recebidos via Ajax diretamente da View
     */
    protected function processaDadosInclusao(){
        $oModelClass = $this->getModelClass();
        if(!empty($oModelClass)){
            $aCampos = $_POST['campos'];
            $aValores = $_POST['valores'];

            if(count($aCampos) && count($aValores)){
                foreach ($aCampos as $sIndice => $sCampo) {
                    call_user_func(array($oModelClass, Bean::callGeter($sCampo, Bean::BEAN_SET)), utf8_decode($aValores[$sIndice]));
                }
            }

            $oModelClass->doInsere();
            echo json_encode(true);
        }
    }

    protected function processaDadosAlteracao(){
        
    }
}