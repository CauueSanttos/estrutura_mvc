<?php
/**
 * Classe de Conexão em MySql, para utilização do PhpMyAdmin (default em diversos servidores)
 * @author Cauê dos Santos Silva <cauedossantossilva@hotmail.com>
 * @since 25/01/2019
 */
class ConexaoMySql{

    private $conexao;

    public function getConexao() {
        return $this->conexao;
    }

    public function setConexao($conexao) {
        $this->conexao = $conexao;
    }

    public function conecta($bDevelopment = true) {
        $aBancoDados = [];

        if($bDevelopment){
            $aBancoDados['host'] = 'localhost';
            $aBancoDados['user'] = 'root';
            $aBancoDados['pass'] = '';
            $aBancoDados['dataBase'] = 'sistema-loja';
        } else {
            $aBancoDados['host'] = 'localhost';
            $aBancoDados['user'] = 'cauesa79_caue';
            $aBancoDados['pass'] = 'palmeiras11';
            $aBancoDados['dataBase'] = 'cauesa79_teste';
        }

        if($oConexao = mysqli_connect($aBancoDados['host'], $aBancoDados['user'], $aBancoDados['pass'], $aBancoDados['dataBase'])){
            $this->setConexao($oConexao);
        }
    }

    public function executa($sSql) {
        if(isset($sSql)){
            return mysqli_query($this->getConexao(), $sSql);
        }
    }

    public function getSqlFetchAssoc($oResultado){
        if(isset($oResultado)){
            while($aDados[] = mysqli_fetch_assoc($oResultado)){
                
            }

            return $aDados;
        }
    }

    public function close() {
        mysqli_close($this->getConexao());
    }
}