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
