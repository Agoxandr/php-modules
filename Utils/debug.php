<?php

namespace Debug;

function log(string $message)
{
    echo ("<script>console.log('PHP: $message')</script>");
};
