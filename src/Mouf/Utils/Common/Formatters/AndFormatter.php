<?php
namespace Mouf\Utils\Common\Formatters;

/**
 * The formatter contains several formatters and applies those formatters in order.
 *
 * @Component
 */
class AndFormatter implements FormatterInterface {

	/**
	 * The formatters to apply.
	 * 
	 * @Property
	 * @Compulsory
	 * @var array<FormatterInterface>
	 */
	public $formatters;
		
	public function __construct($formatters=null) {
		$this->formatters = $formatters;
	}

	/**
	 * Formats the value.
	 *
	 * @param string $value
	 */
	public function format($value) {
		foreach ($this->formatters as $formatter) {
			$value = $formatter->format($value);
		}
		return $value;
	}

}
?>