<?php

declare(strict_types=1);

namespace Renttek\BitbucketWebhookTypes\Entity;

use DateTimeImmutable;
use Doctrine\Common\Collections\Collection;

readonly class Comment
{
    /**
     * @phpstan-param Collection<string, Link> $links
     */
    public function __construct(
        public int $id,
        public bool $deleted,
        public Content $content,
        public User $user,
        public ReducedPullRequest $pullrequest,
        public Collection $links,
        public ?CommentInline $inline = null,
        public ?DateTimeImmutable $createdOn = null,
        public ?DateTimeImmutable $updatedOn = null,
    ) {
    }
}
