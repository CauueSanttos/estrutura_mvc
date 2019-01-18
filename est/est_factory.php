<?php
/**
 * Factory - Responsável por instanciar arquivos na aplicação.
 * @author Cauê dos Santos Silva <cauedossantossilva@hotmail.com>
 * @since 03/01/2019
 */
class Factory {

    const View     = 'view',
          Template = 'template',
          Model    = 'model';

    /**
     * Utilizado para carregar o arquivo na aplicação.
     * @param String $sClassName - Nome da classe.
     * @param String $sLoad - Indica qual pasta deve ser carregado.
     * @param Array $aArguments -  Parâmetros à serem carregados na View.
     */
    static function load($sClassName, $sLoad, $aArguments = array()){
        if(count($aArguments)){
            extract($aArguments);
        }

        switch ($sLoad) {
            case self::View:
                require "view/view_{$sClassName}.php";
                break;
            case self::Template:
                require "view/view_template.php";
                break;
            case self::Model:
                require "model/model_{$sClassName}.php";
                break;
            default:
                require "{$sClassName}.php";
        }
        
    }

    /**
     * Carrega a view na aplicação.
     * @param String $sViewName - Nome da View.
     * @param Array $aArguments - Parâmetros à serem carregados na View.
     * @return Factory
     */
    static function loadView($sViewName, $aArguments = array()){
        return self::load($sViewName, self::View, $aArguments);
    }

    static function loadTemplate($sViewName, $aArguments = array()){
        return self::load($sViewName, self::Template, $aArguments);
    }

    /**
     * Carrega um modelo de dados na aplicação.
     * @param String $sModel - Nome do Model.
     * @return Factory
     */
    static function loadModel($sModel){
        return self::load($sModel, self::Model);
    }
}