<?php

declare(strict_types=1);

namespace Renttek\BitbucketWebhookTypes\Entity;

use DateTimeImmutable;

readonly class Approval
{
    public function __construct(
        public User $user,
        public DateTimeImmutable $date
    ) {
    }
}
