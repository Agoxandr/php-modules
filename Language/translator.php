<?php

namespace Agoxandr\Language;

require __DIR__ . '/../vendor/autoload.php';

class Translator
{
    /**
     * Current lang
     * @var string
     */
    public $lang = "de";
    private $sheet = array();

    /**
     * 
     * @param string $pathNoFilenameEnd -currentLang.csv is automatically added.
     * @param array $supportedLanguages 
     * @param int $maxTextLength Must be greater than the longest line (in characters) to be found in the CSV file (allowing for trailing line-end characters). Omitting this parameter (or setting it to 0) the maximum line length is not limited, which is slightly slower.
     * @return void 
     */
    public function __construct(string $pathNoFilenameEnd, array $supportedLanguages = array("de"), int $maxTextLength = 0)
    {
        $negotiator = new \Negotiation\LanguageNegotiator();

        $bestLanguage = $negotiator->getBest($_SERVER["HTTP_ACCEPT_LANGUAGE"], $supportedLanguages);

        $this->lang = $bestLanguage->getType();
        if (($handle = fopen($pathNoFilenameEnd . "-" . $this->lang . ".csv", "r")) !== false) {
            while (($data = fgetcsv($handle, $maxTextLength, ",")) !== false) {
                $this->sheet[$data[0]] = $data[1];
            }
            fclose($handle);
        }
    }

    /**
     * Return full text of identifier
     * @param string $identifier 
     * @return string
     */
    public function getText($identifier)
    {
        return $this->sheet[$identifier];
    }

    /**
     * Echo full text of identifier
     * @param string $identifier 
     * @return void 
     */
    public function echoText($identifier)
    {
        echo ($this->sheet[$identifier]);
    }
}

namespace PHPSTORM_META {
    override(\Negotiation\LanguageNegotiator::getBest(0), \Negotiation\AcceptLanguage::class);
}
