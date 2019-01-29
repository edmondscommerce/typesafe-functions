<?php declare(strict_types=1);

namespace ts;

/**
 * File get contents that always returns a string
 *
 * Throws a \RuntimeException on error
 *
 * @param string $path
 *
 * @return string
 */
function file_get_contents(string $path): string
{
    $contents = \file_get_contents($path);
    if (false === $contents) {
        throw new \RuntimeException('Failed getting contents of file: ' . $path);
    }

    return $contents;
}

/**
 * File put contents always returns a bool (true)
 *
 * Throws a \RuntimeException on error
 *
 * @param string        $filename
 * @param string        $data
 * @param int           $flags
 * @param null|resource $context
 *
 * @return bool
 */
function file_put_contents(string $filename, string $data, int $flags = 0, $context = null): bool
{
    $result = is_resource($context)
        ? \file_put_contents($filename, $data, $flags, $context)
        : \file_put_contents($filename, $data, $flags);

    if (false !== $result) {
        return true;
    }
    throw new \RuntimeException('Failed writing data to file ' . $filename);
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

/**
 * Replaces \strpos (2 of 3)
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
 * Replaces \strpos (3 of 3)
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
 * Replaces \in_array, always runs in strict comparison mode
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

/**
 * @param string $pattern
 * @param string $replacement
 * @param string $subject
 * @param int    $limit
 * @param int    $count
 *
 * @return string
 */
function preg_replace(
    string $pattern,
    string $replacement,
    string $subject,
    int $limit = -1,
    int &$count = 0
): string {
    $result = \preg_replace($pattern, $replacement, $subject, $limit, $count);
    if (null === $result) {
        throw new \RuntimeException('An unknown error occurred in ' . __METHOD__);
    }

    return $result;
}

function realpath(string $path): string
{
    $result = \realpath($path);
    if (false === $result) {
        throw new \RuntimeException('Failed getting realpath in ' . __METHOD__);
    }

    return $result;
}

/**
 * @return resource
 */
function tmpfile()
{
    $result = \tmpfile();
    if (false === \is_resource($result)) {
        throw new \RuntimeException('An unknown error occurred in ' . __METHOD__);
    }

    return $result;
}