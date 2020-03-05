<?php
include(__DIR__ . "/../translator.php");
use Agoxandr\Language\Translator;

$translator = new Translator(__DIR__ . "/test.csv");
$translator->getText("spawn");
$translator->echoText("spawn");
