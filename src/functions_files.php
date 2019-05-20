<?php declare(strict_types=1);

namespace ts;

function glob(string $pattern, int $flags = GLOB_ERR): array
{
    $result = \glob($pattern, $flags);

    if (false === $result) {
        throw new \RuntimeException('Failed getting glob for pattern: ' . $pattern);
    }

    return $result;
}
