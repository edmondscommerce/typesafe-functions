<?php declare(strict_types=1);

namespace ts;

/**
 * @return resource
 */
function curl_multi_init()
{
    $result = \curl_multi_init();
    if (false === \is_resource($result)) {
        throw new \RuntimeException('An unknown error occurred in ' . __METHOD__);
    }

    return $result;
}

/**
 * @param resource $ch
 *
 * @return string
 */
function curl_multi_getcontent($ch): string
{
    return \curl_multi_getcontent($ch);
}

