<?php
namespace Agoxandr\Language;

class Translator
{
    private $sheet = array();

    public function __construct(string $path, int $maxTextLength = 0)
    {
        if (($handle = fopen($path, "r")) !== false) {
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
