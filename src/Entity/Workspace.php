<?php

declare(strict_types=1);

namespace Renttek\BitbucketWebhookTypes\Entity;

use Doctrine\Common\Collections\Collection;
use Symfony\Component\Uid\Uuid;

readonly class Workspace
{
    /**
     * @phpstan-param Collection<string, Link> $links
     */
    public function __construct(
        public Uuid $uuid,
        public string $name,
        public string $slug,
        public Collection $links,
    ) {
    }
}
