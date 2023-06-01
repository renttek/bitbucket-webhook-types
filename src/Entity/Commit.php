<?php

declare(strict_types=1);

namespace Renttek\BitbucketWebhookTypes\Entity;

readonly class Commit
{
    public function __construct(
        public string $hash,
    ) {
    }
}
