<?php
/**
 * Classe contrutora de objetos
 * @author Cauê dos Santos Silva <cauedossantossilva@hotmail.com>
 * @since 02/02/2019
 */
class Bean {

    const SETTER = 1,
          GETTER = 2;

    static function callMethodBean($oToCall, $sMethod, $iType, $aArg = false){
        if($aMatch = self::extractString($sMethod)){
            $oNovo = self::callGetter($oToCall, $aMatch[1]);
            return self::callMethodBean($oNovo, $aMatch[2], $iType, $aArg);
        } else {
            if($iType == self::GETTER){
                return self::callGetter($oToCall, $sMethod);
            } else {
                return self::callSetter($oToCall, $sMethod, $aArg);
            }
        }
    }

    static function extractString($sMethod, $iNumber = 1){
        $sClass = str_repeat('\.*\w*', $iNumber);
        preg_match('/(' . $sClass . ')\.(.*)/', $sMethod, $aMatch);

        if(count($aMatch) > 0){
            return $aMatch;
        } else {
            return false;
        }
    }

    static function callGetter($oClass, $sMethodClass){
        return self::callMethod($oClass, self::getNameGetter($sMethodClass));
    }

    static function callSetter($oClass, $sMethodClass, $aArg){
        return self::callMethod($oClass, self::getNameSetter($sMethodClass), $aArg);
    }

    static function getNameGetter($sNameAtributte){
        return 'get' . self::toCamelCase($sNameAtributte);
    }

    static function getNameSetter($sNameAtributte){
        return 'set' . self::toCamelCase($sNameAtributte);
    }

    static function toCamelCase($sString){
        return ucwords($sString);
    }

    static function callMethod($oClass, $sMethod, $xArgs = false){
        if(is_object($oClass)){
            if($xArgs){
                if(!is_array($xArgs)){
                    return call_user_func(array($oClass, $sMethod), $xArgs);
                } else {
                    return call_user_func_array(array($oClass, $sMethod), $xArgs);
                }
            } else {
                return call_user_func(array($oClass, $sMethod));
            }
        } else {
            throw new Exception('A váriavel informáda não é um objeto');
        }
    }
}