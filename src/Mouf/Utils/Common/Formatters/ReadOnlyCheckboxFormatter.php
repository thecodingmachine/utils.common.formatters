<?php
namespace Mouf\Utils\Common\Formatters;

/**
 * The readonly checkbox formatter is used to display checkboxes in columns instead of 0/1 or true/false.
 * The checkbox is always "disabled".
 *
 * @Component
 */
class ReadOnlyCheckboxFormatter implements FormatterInterface {
	
	/**
	 * Formats the value.
	 *
	 * @param string $value
	 */
	public function format($value) {
		if (empty($value) || $value == 0) {
			return '<input type="checkbox" disabled="true" />';
		} else {
			return '<input type="checkbox" disabled="true" checked="true" />';
		}
	}
}
?>