<?php
namespace Mouf\Utils\Common\Formatters;

/**
 * The PrefixSuffixFormatter is used to prepend or append some text to the value passed.
 * 
 * @Component
 */
class PrefixSuffixFormatter implements FormatterInterface {

	/**
	 * The prefix to add.
	 * 
	 * @Property
	 * @var string
	 */
	public $prefix;
	
	/**
	 * The suffix to add
	 * 
	 * @Property
	 * @var string
	 */
	public $suffix;
	
	public function __construct($prefix=null, $suffix=null) {
		$this->prefix = $prefix;
		$this->suffix = $suffix;
	}
	
	/**
	 * Formats the value.
	 *
	 * @param string $value
	 */
	public function format($value) {
		return $this->prefix.$value.$this->suffix;
	}
}
?>