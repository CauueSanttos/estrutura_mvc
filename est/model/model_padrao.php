<?php
/**
 * Modelo de Dados padrão
 * @author Cauê dos Santos Silva <cauedossantossilva@hotmail.com>
 * @since 03/01/2019
 */
class ModelPadrao {

    /**
     * @var Conexao
     */
    protected $conexao;

    public function __construct() {
        global $oConexao;
        $this->setConexao($oConexao);
    }

    public function getConexao() {
        return $this->conexao;
    }

    public function setConexao($conexao) {
        $this->conexao = $conexao;
    }
    
}