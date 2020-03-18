<?php

require("../../vendor/autoload.php");

use \EditorJS\EditorJS;

$data;
$configuration = '
"paragraph": {
    "text": {
        "type": "string",
        "allowedTags": "i,b,u,a[href]"
    }
}
';

try {
    // Initialize Editor backend and validate structure
    $editor = new EditorJS($data, $configuration);

    // Get sanitized blocks (according to the rules from configuration)
    $blocks = $editor->getBlocks();
} catch (\Exception $e) {
    // process exception
}
