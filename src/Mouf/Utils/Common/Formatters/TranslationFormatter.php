<?php
namespace Mouf\Utils\Common\Formatters;

/**
 * The translation formatter is used to translate a text using Fine.
 *
 * @Component
 */
class TranslationFormatter implements FormatterInterface {

	private $translationPrefix;
	private $translationSuffix;
	
	/**
	 * The prefix for the I18N key.
	 * For instance, if the column contains: "yes", if the prefix is "common" and if the French translation for "common.yes" is "Oui",
	 * then "Oui" will be displayed.
	 *
	 * @Property
	 * @Compulsory
	 * @param string $prefix
	 */
	public function setTranslationPrefix($prefix) {
		$this->translationPrefix = $prefix;
	}
	
	/**
	 * Returns the prefix used in translation.
	 *
	 * @return string
	 */
	public function getTranslationPrefix() {
		return $this->translationPrefix;
	}
	
	/**
	 * The suffix for the I18N key.
	 * For instance, if the column contains: "yes", if the suffix is "common" and if the French translation for "yes.common" is "Oui",
	 * then "Oui" will be displayed.
	 *
	 * @Property
	 * @Compulsory
	 * @param string $suffix
	 */
	public function setTranslationSuffix($suffix) {
		$this->translationSuffix = $suffix;
	}
	
	/**
	 * Translates the value, if required.
	 *
	 * @param string $value
	 * @return string
	 */
	protected function getTranslatedValue($value) {
	}

	
	public function __construct($translationPrefix=null, $translationSuffix=null) {
		$this->translationPrefix = $translationPrefix;
		$this->translationSuffix = $translationSuffix;
	}

	/**
	 * Formats the value.
	 *
	 * @param string $value
	 */
	public function format($value) {
		return iMsg($this->translationPrefix.$value.$this->translationSuffix);
	}

}
?>