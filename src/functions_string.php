<?php declare(strict_types=1);

namespace ts;

/**
 * Replaces \stripos
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
function stripos(string $haystack, string $needle): int
{
    $pos = \stripos($haystack, $needle);
    if (false === $pos) {
        throw new \RuntimeException('Failing finding needle "' . $needle . '" in haystack "' . $haystack . '"');
    }

    return $pos;
}

/**
 * Replaces \strpos (1 of 3)
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
        throw new \RuntimeException('Failing finding needle "' . $needle . '" in haystack "' . $haystack . '"');
    }

    return $pos;
}

function strrpos(string $haystack, string $needle, int $offset = 0): int
{
    $pos = \strrpos($haystack, $needle, $offset);
    if (false === $pos) {
        throw new \RuntimeException('Failing finding needle "' . $needle . '" in haystack "' . $haystack . '"');
    }

    return $pos;
}

/**
 * Replaces \strpos (2 of 3)
 *
 * To be used when using strpos to check if a string contains the needle
 *
 * @param string $haystack
 * @param string $needle
 * @param bool   $caseSensitive
 *
 * @return bool
 */
function stringContains(string $haystack, string $needle, bool $caseSensitive = false): bool
{
    $pos = ($caseSensitive === true)
        ? \strpos($haystack, $needle)
        : \stripos($haystack, $needle);

    if (false === $pos) {
        return false;
    }

    return true;
}

/**
 * Replaces \strpos (3 of 3)
 *
 * To be used when checking if a string starts with the needle
 *
 * @param string $haystack
 * @param string $needle
 * @param bool   $caseSensitive
 *
 * @return bool
 */
function stringStartsWith(string $haystack, string $needle, bool $caseSensitive = false): bool
{
    $pos = ($caseSensitive === true)
        ? \strpos($haystack, $needle)
        : \stripos($haystack, $needle);
    if (0 === $pos) {
        return true;
    }

    return false;
}

/**
 * Replaces \print_r($var, true), always returns a string
 *
 * @param mixed $var
 *
 * @return string
 */
function varToString($var): string
{
    return \print_r($var, true);
}


/**
 * Replaces \print_r
 *
 * @param mixed $mixed
 *
 * @param bool  $return
 *
 * @return string|null
 */
function print_r($mixed, bool $return): ?string
{
    if (true === $return) {
        return \print_r($mixed, true);
    }
    \print_r($mixed);
}

/**
 * @param string   $time
 * @param int|null $now
 *
 * @return int
 */
function strtotime(string $time, int $now = null): int
{
    $result = \is_int($now)
        ? \strtotime($time, $now)
        : \strtotime($time);

    if ($result === false) {
        throw new \RuntimeException('Failed to get time from string: ' . $time);
    }

    return $result;
}