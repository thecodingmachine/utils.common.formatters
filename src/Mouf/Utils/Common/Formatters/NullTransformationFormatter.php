<?php
namespace Mouf\Utils\Common\Formatters;

/**
 * The null transformation formatter will replace a NULL value with the value specified in the formatter.
 *
 * @Component
 */
class NullTransformationFormatter implements FormatterInterface {

	/**
	 * The value to replace the NULL value with.
	 * 
	 * @Property
	 * @Compulsory
	 * @var string
	 */
	public $value;
	
	/**
	 * Whether the value passed above should be translated or not.
	 * 
	 * @Property
	 * @var bool
	 */
	public $useI18n;
	
	public function __construct($value=null, $useI18n=false) {
		$this->value = $value;
		$this->useI18n = $useI18n;
	}

	/**
	 * Formats the value.
	 *
	 * @param string $value
	 */
	public function format($value) {
    	if ($value ===  null) {
    		if (!$this->useI18n) {
    			return $this->value;
    		} else {
    			return iMsg($this->value);
    		}
    	} else {
    		return $value;
    	}
	}

}
?>