<?php
/**
 * Persistência Padrão
 * @author Cauê dos Santos Silva <cauedossantossilva@hotmail.com>
 * @since 06/02/2019
 */
abstract class PersistenciaPadrao extends Relacionamento {

    public function getRelacionamento() {
        return $this->Relacionamento;
    }

    abstract function setRelacionamento();

    public function addRelacionamento($sNomeBanco, $sNomeModelo, $bChave = false){
        
    }
}