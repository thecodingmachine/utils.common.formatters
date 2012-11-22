<?php
namespace Mouf\Utils\Common\Formatters;

/**
 * The switch formatter is used to transform a value into another based on a list of choices (like in a PHP switch statement).
 * For instance, it can be used to transform values (like 1, 2, 3) into HTML (like images tags,  etc...)
 *
 * @Component
 */
class SwitchFormatter implements FormatterInterface {

	/**
	 * The list of possible transforms.
	 * The formatter will tranform the keys into values.
	 * 
	 * @Property
	 * @var array<string, string>
	 */
	public $choices;
	
	/**
	 * The default value that will be displayed if no key of the choices array matches the passed parameter.
	 * 
	 * @Property
	 * @var string
	 */
	public $default;
		
	/**
	 * Formats the value.
	 *
	 * @param string $value
	 */
	public function format($value) {
		if (isset($this->choices[$value])) {
			return $this->choices[$value];
		} else {
			return $this->default;
		}
	}
	
}
?>