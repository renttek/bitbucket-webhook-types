<?php

declare(strict_types=1);

namespace Renttek\BitbucketWebhookTypes\Entity;

readonly class Content
{
    public function __construct(
        public string $raw,
        public string $markup,
        public string $html,
    ) {
    }
}
