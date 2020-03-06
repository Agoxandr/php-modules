<?php
namespace Agoxandr\Language;

class Translator
{
    private $sheet = array();

    public function __construct(string $pathNoFilenameEnd, array $supportedLanguages = array("de"), int $maxTextLength = 0)
    {
        $lang = $supportedLanguages[0];
        if (!empty($_GET["lang"])) {
            $getLang = $_GET["lang"];
            if (in_array($getLang, $supportedLanguages)) {
                $lang = $getLang;
            }
        }
        if (!empty($_COOKIE["lang"])) {
            $cookieLang = $_COOKIE["lang"];
            if (in_array($cookieLang, $supportedLanguages)) {
                $lang = $cookieLang;
            }
        }
        if (($handle = fopen($pathNoFilenameEnd . "-" . $lang . ".csv", "r")) !== false) {
            while (($data = fgetcsv($handle, $maxTextLength, ",")) !== false) {
                $this->sheet[$data[0]] = $data[1];
            }
            fclose($handle);
        }
    }

    public function getText($identifier)
    {
        return $this->sheet[$identifier];
    }

    public function echoText($identifier)
    {
        echo($this->sheet[$identifier]);
    }
}
