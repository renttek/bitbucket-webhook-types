<?php

declare(strict_types=1);

namespace Renttek\BitbucketWebhookTypes\EventPayload;

use Renttek\BitbucketWebhookTypes\Entity\ChangeRequest;
use Renttek\BitbucketWebhookTypes\Entity\PullRequest;
use Renttek\BitbucketWebhookTypes\Entity\Repository;
use Renttek\BitbucketWebhookTypes\Entity\User;

readonly class ChangeRequestRemoved
{
    public function __construct(
        public Repository $repository,
        public User $actor,
        public PullRequest $pullrequest,
        public ChangeRequest $changesRequest,
    ) {
    }
}
