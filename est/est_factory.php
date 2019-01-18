<?php
/**
 * Factory - Responsável por instanciar arquivos na aplicação.
 * @author Cauê dos Santos Silva <cauedossantossilva@hotmail.com>
 * @since 03/01/2019
 */
class Factory {

    static function load($sViewName, $aArguments = array()){
        extract($aArguments);
        require "view/view_{$sViewName}.php";
    }

    static function loadView($sViewName, $aArguments = array()){
        return self::load($sViewName, $aArguments);
    }
}