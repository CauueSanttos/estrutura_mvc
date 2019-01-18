<?php
/**
 * Controller do Index
 * @author Cauê dos Santos Silva <cauedossantossilva@hotmail.com>
 * @since 03/01/2019
 */
class ControllerHome extends ControllerPadrao{

    public function montaTela() {
        $aDados = Array(
            'sNome' => 'Cauê',
            'iIdade' => '19'
        );

        $this->getInstanceTela('home', $aDados);
    }
}