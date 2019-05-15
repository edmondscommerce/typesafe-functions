<?php declare(strict_types=1);

namespace ts;

/**
 * File get contents that always returns a string
 *
 * Throws a \RuntimeException on error
 *
 * @param string        $path
 * @param bool          $use_include_path
 * @param resource|null $context
 * @param int           $offset
 * @param int           $maxlen
 *
 * @return string
 */
function file_get_contents(
    string $path,
    bool $use_include_path = false,
    $context = null,
    int $offset = 0,
    int $maxlen = null
): string {
    $contents = (null !== $maxlen)
        ? \file_get_contents($path, $use_include_path, $context, $offset, $maxlen)
        : \file_get_contents($path, $use_include_path, $context, $offset);

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
 * Replaces \strstr
 *
 * @param string $haystack
 * @param string $needle
 * @param bool   $before_needle
 *
 * @return string
 */

function strstr(string $haystack, string $needle, bool $before_needle = false): string
{
    $str = \strstr($haystack, $needle, $before_needle);

    if (false === $str && true === $before_needle) {
        throw new \RuntimeException(
            'Failing finding string before needle "' . $needle . '" in haystack "' . $haystack . '"'
        );
    }

    if (false === $str) {
        throw new \RuntimeException(
            'Failing finding needle "' . $needle . '" in haystack "' . $haystack . '"'
        );
    }

    return $str;
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


/**
 * @param mixed $value
 * @param int   $options
 * @param int   $depth
 *
 * @return string
 */
function json_encode($value, int $options = 0, int $depth = 512): string
{
    $result = \json_encode($value, $options, $depth);
    if (false === $result) {
        $err = json_last_error();
        if ($err !== JSON_ERROR_NONE) {
            throw new \RuntimeException('An error occurred in ' . __METHOD__ . ' ' . json_last_error_msg());
        }
        throw new \RuntimeException('An unknown error occurred in ' . __METHOD__);
    }

    return $result;
}

function ini_get(string $varname): string
{
    $result = \ini_get($varname);
    if (false === $result) {
        throw new \RuntimeException('Failed getting ' . $varname . ' in ' . __METHOD__);
    }

    return $result;
}
