<?php

namespace Agoxandr\Language;

include(__DIR__ . "/../Utils/debug.php");
include(__DIR__ . "/../Utils/common.php");

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
        $acceptLanguage = $_SERVER["HTTP_ACCEPT_LANGUAGE"];
        if (empty($acceptLanguage)) {
            $this->lang = $supportedLanguages[0];
        }
        foreach ($supportedLanguages as $supportedLanguage) {
            if (str_contains($acceptLanguage, $supportedLanguage)) {
                $this->lang = $supportedLanguage;
                break;
            }
        }
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
