<?php

declare(strict_types=1);

namespace Renttek\BitbucketWebhookTypes\Entity;

use DateTimeImmutable;
use Doctrine\Common\Collections\Collection;

readonly class PullRequest
{
    /**
     * @phpstan-param Collection<string, Participant> $participants
     * @phpstan-param Collection<string, User>        $reviewers
     * @phpstan-param Collection<string, Link>        $links
     */
    public function __construct(
        public int $id,
        public string $title,
        public string $description,
        public PullRequestState $state,
        public User $author,
        public Source $source,
        public Destination $destination,
        public ?Commit $mergeCommit,
        public Collection $participants,
        public Collection $reviewers,
        public bool $closeSourceBranch,
        public ?User $closedBy,
        public ?string $reason,
        public DateTimeImmutable $createdOn,
        public DateTimeImmutable $updatedOn,
        public Collection $links
    ) {
    }
}
