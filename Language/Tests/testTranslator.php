<?php
require("../translator.php");
use Agoxandr\Language\Translator;

$translator = new Translator("test.csv");
echo($translator->getText("spawn"));
