<?php declare(strict_types=1);

namespace ts;

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