<?php
/**
 * Classe de Conexão
 * @author Cauê dos Santos Silva
 * @since 03/01/2018
 */

class Conexao{
    
    public $conexao;
    
    public function getConexao() {
        return $this->conexao;
    }

    public function setConexao($conexao) {
        $this->conexao = $conexao;
    }
    
    /**
     * Realiza a Conexão com o Banco de Dados
     * @param Bool $bDevelopment
     */
    public function conecta($bDevelopment = true){
        if($bDevelopment){
            //Servidor Local
            $sHost     = 'localhost';
            $iPort     = 5432;
            $sDbName   = 'desafio';
            $sUser     = 'postgres';
            $sPassword = 'postgres';
        } else {
            //Servidor Hospedado
            $sHost     = '';
            $iPort     = '';
            $sDbName   = '';
            $sUser     = '';
            $sPassword = '';
        }

        $oConnection = pg_connect("host={$sHost} port={$iPort} dbname={$sDbName} user={$sUser} password={$sPassword}");
        
        $this->setConexao($oConnection);
    }
    
    /**
     * Executa operações SQL.
     * @param String $sSql
     * @return xResult
     */
    public function executa($sSql){
        if(isset($sSql)){
            return pg_query($this->getConexao(), $sSql);
        }
    }
    
    /**
     * Realiza a Contagem de Linhas de uma execução SQL.
     * @param Object $oResultado
     * @return Integer
     */
    public function rows($oResultado){
        if(isset($oResultado)){
            return pg_num_rows($oResultado);
        }
    }

    /**
     * Retorna um objeto dinâmico para uso.
     * @param Object $oResultado
     * @return Array
     */
    public function getSqlFetchAssoc($oResultado){
        if(isset($oResultado)){
            while($aDados[] = pg_fetch_assoc($oResultado)){
                $aDadosSql = $aDados[0];
            }

            return $aDadosSql;
        }
    }

    /**
     * Finaliza a conexão com o Banco de Dados.
     */
    public function close(){
        pg_close();
    }
}