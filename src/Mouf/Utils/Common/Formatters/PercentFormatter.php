<?php

namespace Mouf\Utils\Common\Formatters;

/**
 * The PercentFormatter class transform a float into a purcent or 
 * a percent into a float.
 * 
 * @Component
 */
class PercentFormatter implements BijectiveFormatterInterface {

    
    /**
     * Transform a float into a percentage
     * @see BijectiveFormatterInterface::format()
     */
    public function format($value) {
        if($value=="") {
        	return null;
        }
        
        $value *= 100;
        return ($value . "%");
    }
    
    /**
     * Transform a percentage into a float
     * @see BijectiveFormatterInterface::unformat()
     */
    public function unformat($value) {
        if($value=="") {
        	return null;
        }
        $value = rtrim($value,"%");
        return ($value/100);
    }
    
}

?>