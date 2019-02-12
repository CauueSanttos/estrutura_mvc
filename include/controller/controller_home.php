<?php
/**
 * Controller da página inicial.
 * @author Cauê dos Santos Silva <cauedossantossilva@hotmail.com>
 * @since 20/01/2019
 */
class ControllerHome extends ControllerPadrao{

    public function montaTela() {
        $this->getInstanceTemplate('home');
        $this->getInstanceTela('home');
    }

    public function teste($sNameMethod = 'Marca.descricao'){
        $sDescricaoMarca = 'Honda';
        Bean::callMethodBean($this->getModel(), $sNameMethod, Bean::SETTER, $sDescricaoMarca);

        $sDesc = Bean::callMethodBean($this->getModel(), $sNameMethod, Bean::GETTER);
        echo $sDesc;
    }
}