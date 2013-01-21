<?php

namespace Mouf\Utils\Common\Formatters;

/**
 * The siret formatter is used to format a siret to XXX XXX XXX XXXXX.
 * It must be attached to a column in order to be activated.
 * 
 * @Component
 */
class SiretFormatter implements BijectiveFormatterInterface {

    /**
     * The format of the source. No need to modify
     * 
     * @Property
     * @Compulsory
     * @var string
     */
    protected $sourceFormat = 'string';

    /**
     * The format of the destination. No need to modify 
     * 
     * @Property
     * @Compulsory
     * @var string
     */
    protected $destFormat = 'string';

    public function __construct($sourceFormat = null, $destFormat = null, $useI18nForDest = null) {
        $this->sourceFormat = $sourceFormat;
        $this->destFormat = $destFormat;
    }

    /**
     * Returns the real dest format (using translation if necessary). 
     *
     * @return string
     */
    public function getDestFormat() {
        return $this->destFormat;
    }

    /**
     * Formats the value.
     *
     * @param string $value
     */
    public function format($value) {
        while (strlen($value) < 14) {
            $value .= '0';
        }

        $returned_value = substr($value, 0, 3) . " " . substr($value, 3, 3) . " " . substr($value, 6, 3) . " " . substr($value, 9, 5);

        return $returned_value;
    }

    /**
     * (non-PHPdoc)
     * @see BijectiveFormatterInterface::unformat()
     */
    public function unformat($value) {
        $value = str_replace(" ", "", $value);
        return $value;
    }

}

?>