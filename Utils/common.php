<?php

/**
 * Returns a value indicating whether a specified substring occurs within this string.
 * @param string $haystack The string to search in.
 * @param string $value The string to seek.
 * @return bool True if the value parameter occurs within this string, or if value is the empty string (""); otherwise, false.
 */
function str_contains(string $haystack, string $value)
{
    return strpos($haystack, $value) !== false;
}
