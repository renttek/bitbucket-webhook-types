<?php

declare(strict_types=1);

namespace Renttek\BitbucketWebhookTypes\Entity;

use Doctrine\Common\Collections\Collection;

readonly class ReducedPullRequest
{
    /**
     * @phpstan-param Collection<string, Link> $links
     */
    public function __construct(
        public int $id,
        public string $title,
        public Collection $links
    ) {
    }
}
