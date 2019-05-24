<?php declare(strict_types=1);

namespace ts;

/**
 * @param string $pattern
 * @param string $replacement
 * @param string $subject
 * @param int $limit
 * @param int $count
 *
 * @return string
 */
function preg_replace(
    string $pattern,
    string $replacement,
    string $subject,
    int $limit = -1,
    int &$count = 0
): string
{
    $result = \preg_replace($pattern, $replacement, $subject, $limit, $count);
    if (null === $result) {
        throw new \RuntimeException('An unknown error occurred in ' . __METHOD__);
    }

    return $result;
}


function preg_split(string $pattern, string $subject, int $limit = -1, int $flags = 0): array
{
    $result = \preg_replace($pattern, $subject, $limit, $flags);

    if (false === $result) {
        throw new \RuntimeException('An unknown error occurred in ' . __METHOD__);
    }

    return $result;

}
