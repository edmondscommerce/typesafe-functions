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
 * @param string $filePath
 *
 * @return array
 */
function file(string $filePath): array
{
    $result = \file($filePath);
    if (false === $result) {
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