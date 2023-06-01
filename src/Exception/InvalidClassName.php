<?php

declare(strict_types=1);

namespace Renttek\BitbucketWebhookTypes\Exception;

use RuntimeException;

class InvalidClassName extends RuntimeException
{
    public static function classDoesNotExist(string $class): self
    {
        return new self("The class '{$class}' does not exist");
    }
}
