<?php

declare(strict_types=1);

namespace Renttek\BitbucketWebhookTypes\Exception;

use RuntimeException;

class InvalidJsonString extends RuntimeException
{
    public static function fromJsonErrorCode(int $jsonErrorCode): self
    {
        return new self(json_last_error_msg(), $jsonErrorCode);
    }
}
