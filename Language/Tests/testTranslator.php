<?php
include(__DIR__ . "/../translator.php");
use Agoxandr\Language\Translator;

$translator = new Translator(__DIR__ . "/test.csv");
echo($translator->getText("spawn"));
