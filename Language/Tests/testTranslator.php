<?php
include(__DIR__ . "/../translator.php");
use Agoxandr\Language\Translator;

$translator = new Translator(__DIR__ . "/test", array("en"));
$translator->getText("spawn");
$translator->echoText("spawn");
