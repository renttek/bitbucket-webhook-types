<?php

declare(strict_types=1);

namespace Renttek\BitbucketWebhookTypes\Entity;

use Doctrine\Common\Collections\Collection;
use Symfony\Component\Uid\Uuid;

readonly class Repository
{
    /**
     * @phpstan-param Collection<string, Link> $links
     */
    public function __construct(
        public Uuid $uuid,
        public Project $project,
        public Workspace $workspace,
        public string $fullName,
        public string $name,
        public ?string $website,
        public Scm $scm,
        public bool $isPrivate,
        public Collection $links,
    ) {
    }
}
