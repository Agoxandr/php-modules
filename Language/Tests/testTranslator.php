<?php
include("");
use Agoxandr\Language\Translator;

$translator = new Translator(__DIR__ . "/test", array("en"));
$translator->getText("spawn");
$translator->echoText("spawn");
