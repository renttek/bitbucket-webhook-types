<?php

declare(strict_types=1);

namespace Renttek\BitbucketWebhookTypes\Entity;

readonly class Link
{
    public function __construct(
        public string $href,
    ) {
    }
}
