<?php
namespace Mouf\Utils\Common\Formatters;

/**
 * The formatter interface is implemented by any formatter.
 * Formatters are simple classes that transform a string into another.
 * For instance, a formatter could be used to format a date, translate a string, put a string in bold, etc...
 *
 */
interface FormatterInterface {
	/**
	 * Formats the value.
	 *
	 * @param string $value
	 */
	public function format($value);
}
?>