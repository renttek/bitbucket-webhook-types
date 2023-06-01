<?php

declare(strict_types=1);

namespace Renttek\BitbucketWebhookTypes\Entity;

use DateTimeImmutable;

readonly class Participant
{
    public function __construct(
        public User $user,
        public bool $approved,
        public ParticipantRole $role,
        public ?ParticipantState $state = null,
        public ?DateTimeImmutable $participatedOn = null
    ) {
    }
}
