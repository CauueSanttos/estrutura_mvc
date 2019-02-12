<?php
/**
 * Classe de relacionamento padrão
 * @author Cauê dos Santos Silva <cauedossantossilva@hotmail.com>
 * @since 09/02/2019
 */
class Relacionamento {

    public $Relacionamento;
    public $Tabela;
    public $Join;

    public function getTabela() {
        return $this->Tabela;
    }

    public function getJoin() {
        return $this->Join;
    }

    public function setTabela($Tabela) {
        $this->Tabela = $Tabela;
    }

    public function addJoin($Join) {
        $this->Join = $Join;
    }
}