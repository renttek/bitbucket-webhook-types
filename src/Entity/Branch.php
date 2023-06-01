<?php

declare(strict_types=1);

namespace Renttek\BitbucketWebhookTypes\Entity;

readonly class Branch
{
    public function __construct(
        public string $name,
    ) {
    }
}
