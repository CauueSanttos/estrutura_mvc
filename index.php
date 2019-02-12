<?php
/**
 * Página Inicial do Projeto.
 * @author Cauê dos Santos Silva <cauedossantossilva@hotmail.com>
 * @since  03/01/2019
 */

session_start();
require './config.php';

spl_autoload_register(function ($sClass){
    $sClasse = strtolower($sClass);

    //Quando for um controller, adiciona o underline
    $sNomeController = str_replace('controller', 'controller_', $sClasse);

    //Quando for um modelo, adiciona o underline
    $sNomeModel = str_replace('model', 'model_', $sClasse);

    if(file_exists("include/controller/{$sNomeController}.php")){
        require "include/controller/{$sNomeController}.php";
    } else if (file_exists("include/model/{$sNomeModel}.php")){
        require "include/model/{$sNomeModel}.php";
    } else if (file_exists("est/est_{$sClasse}.php")){
        require "est/est_{$sClasse}.php";
    } else if (file_exists("est/controller/{$sNomeController}.php")){
        require "est/controller/{$sNomeController}.php";
    } else if (file_exists("est/model/{$sNomeModel}.php")){
        require "est/model/{$sNomeModel}.php";
    }
});

$oCore = new Core();
$oCore->run();