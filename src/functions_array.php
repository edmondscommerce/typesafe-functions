<?php declare(strict_types=1);

namespace ts;

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
 * @param mixed $needle
 * @param array $haystack
 *
 * @return bool
 */
function in_array($needle, array $haystack): bool
{
    return \in_array($needle, $haystack, true);
}

/**
 * @param array $keys
 * @param array $values
 *
 * @return array
 */
function array_combine(array $keys, array $values): array
{
    $result = \array_combine($keys, $values);
    if (false === $result) {
        $keysCount   = count($keys);
        $valuesCount = count($values);
        if ($keysCount !== $valuesCount) {
            throw new \InvalidArgumentException(
                "The number of keys ($keysCount) and values ($valuesCount) are not the same in " . __METHOD__
            );
        }
        throw new \RuntimeException('An unknown error occurred in ' . __METHOD__);
    }

    return $result;
}

function array_slice(array $array, int $offset, int $length = null, bool $preserve_keys = false): array
{
    $result = \array_slice($array, $offset, $length, $preserve_keys);
    if ([] === $result) {
        throw new \RuntimeException('Slice is empty in ' . __METHOD__);
    }

    return $result;
}

function array_chunk(array $input, int $size, bool $preserve_keys = false): array
{
    $result = \array_chunk($input, $size, $preserve_keys);

    if ([] === $result) {
        throw new \RuntimeException('Array is empty in ' . __METHOD__);
    }

    return $result;
}