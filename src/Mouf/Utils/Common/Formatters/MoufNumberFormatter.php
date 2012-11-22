<?php
namespace Mouf\Utils\Common\Formatters;

/**
 * The number formatter is used to format a number in a column.
 * It must be attached to a column in order to be activated.
 *
 * @Component
 */
class MoufNumberFormatter implements FormatterInterface {

	/**
	 * Determines the separator for the decimals.
	 * 
	 * @Property
	 * @var string
	 */
	public $decimalSeparator;
	
	/**
	 * Determines the separator for the thousands.
	 * 
	 * @Property
	 * @var string
	 */
	public $thousandsSeparator;
	
	/**
	 * Determines how many decimal places we should have for the number
	 * 
	 * @Property
	 * @var string
	 */
	public $decimalPlaces;
	
	public function __construct($decimalSeparator=".", $thousandsSeparator=" ", $decimalPlaces=2) {
		$this->decimalSeparator = $decimalSeparator;
		$this->thousandsSeparator = $thousandsSeparator;
		$this->decimalPlaces = $decimalPlaces;
	}
	
	/**
	 * Formats the value.
	 *
	 * @param string $value
	 */
	public function format($value) {
		return self::numberFormat($value, $this->decimalPlaces, $this->decimalSeparator, $this->thousandsSeparator);
	}
	
	/**
	 * Apply a number_format with many chacacters for separator
	 * 
	 * @param string $number Source number
	 * @param string $decimal number of decimal
	 * @param string $dec_sep Decimal separator
	 * @param string $th_sep Thousand separator
	 */
	static public function numberFormat($number, $decimal, $dec_sep = null, $th_sep = null) {
		if($dec_sep || $th_sep) {
			$numberFormat = number_format($number, $decimal, $dec_sep, "%");
			$numberFormat = str_replace("%", $th_sep, $numberFormat);
		}
		else
			$numberFormat = number_format($number, $decimal);
		return $numberFormat;
	}
}
?>