<?php

namespace Mouf\Utils\Common\Formatters;

/**
 * 
 * The UrlToLink class transform any url to a html link <a>
 * 
 * @Component
 * @author Pierre
 * 
 */
class UrlToLinkFormatter implements FormatterInterface {

    /**
     * Transform any url to a html link <a>
     * @see FormatterInterface::format()
     */
    public function format($value) {
		$text = preg_replace('/http(s)*:\/\/[0-9a-z\.\:\/\-_&=?%]+/', '<a href="${0}" target="_blank">${0}</a>', $value);
		return $text;
    }
    
}
?>