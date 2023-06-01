<?php

declare(strict_types=1);

namespace Renttek\BitbucketWebhookTypes\Entity;

enum ParticipantState: string
{
    case APPROVED = 'approved';
    case CHANGES_REQUESTED = 'changes_requested';
}
