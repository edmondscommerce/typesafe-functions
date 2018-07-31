<?php declare(strict_types=1);

namespace ts;

function file_get_contents(string $path): string
{
    $contents = \file_get_contents($path);
    if (false === $contents) {
        throw new \RuntimeException('Failed getting contents of file: '.$path);
    }

    return $contents;
}

/**
 * Replaces \strpos
 *
 * To be used when actually looking for the string position
 *
 * If you are checking for the existence of the string, then you should replace with \ts\stringContains
 *
 * @param string $haystack
 * @param string $needle
 *
 * @return int
 *
 */
function strpos(string $haystack, string $needle): int
{
    $pos = \strpos($haystack, $needle);
    if (false === $pos) {
        throw new \RuntimeException('Failing finding need "'.$needle.'" in haystack "'.$haystack.'"');
    }

    return $pos;
}

/**
 * Replaces \strpos
 *
 * To be used when using strpos to check if a string contains the needle
 *
 * @param string $haystack
 * @param string $needle
 *
 * @return bool
 */
function stringContains(string $haystack, string $needle): bool
{
    $pos = \strpos($haystack, $needle);
    if (false === $pos) {
        return false;
    }

    return true;
}

/**
 * Replaces \strpos
 *
 * To be used when checking if a string starts with the needle
 *
 * @param string $haystack
 * @param string $needle
 *
 * @return bool
 */
function stringStartsWith(string $haystack, string $needle): bool
{
    $pos = \strpos($haystack, $needle);
    if (0 === $pos) {
        return true;
    }

    return false;
}

/**
 * Replaces \print_r($var, true)
 *
 * @param mixed $var
 *
 * @return string
 */
function varToString($var): string
{
    return (string)\print_r($var, true);
}

/**
 * Ensures in_array is in strict mode.
 *
 * @param mixed $needle
 * @param array $haystack
 *
 * @return bool
 */
function arrayContains($needle, array $haystack): bool
{
    return \in_array($needle, $haystack, true);
}
