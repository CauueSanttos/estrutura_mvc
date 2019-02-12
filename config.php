<?php
/**
 * Configuração do Projeto
 * @author Cauê dos Santos Silva <cauedossantossilva@hotmail.com>
 * @since 03/01/2018
 */

require './environment.php';
require './est/est_conexao_mysql.php';

if(ENVIRONMENT == 'development'){
    define('BASE_URL', 'http://tropical.v2/');
    $bDevelopment = true;
} else {
    $bDevelopment = false;
}

GLOBAL  $oConexao;

try{
    /* @var $oConexao ConexaoMySql */
    $oConexao = new ConexaoMySql();
    $oConexao->conecta($bDevelopment);
} catch (PDOException $ex) {
    echo $ex->getMessage();
    exit;
}