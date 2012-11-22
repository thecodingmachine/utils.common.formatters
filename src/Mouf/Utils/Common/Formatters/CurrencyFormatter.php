<?php
namespace Mouf\Utils\Common\Formatters;

/**
 * The currency formatter is used to format a currency in a column.
 * It must be attached to a column in order to be activated.
 * It extends the NumberFormatter and adds a prefix or a suffix.
 * 
 * @Component
 */
class CurrencyFormatter extends MoufNumberFormatter {

	/**
	 * The prefix for the currency ($, €, ...)
	 * 
	 * @Property
	 * @var string
	 */
	public $prefix;
	
	/**
	 * The suffix for the currency ($, €, ...)
	 * 
	 * @Property
	 * @var string
	 */
	public $suffix;
	
	public function __construct($decimalSeparator=".", $thousandsSeparator=" ", $decimalPlaces=2, $prefix=null, $suffix=null) {
		parent::__construct($decimalSeparator, $thousandsSeparator, $decimalPlaces);
		$this->prefix = $prefix;
		$this->suffix = $suffix;
	}
	
	/**
	 * Formats the value.
	 *
	 * @param string $value
	 */
	public function format($value) {
		return $this->prefix.number_format($value, $this->decimalPlaces, $this->decimalSeparator, $this->thousandsSeparator).$this->suffix;
	}
	
}
?>