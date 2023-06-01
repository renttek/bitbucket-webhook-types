<?php

declare(strict_types=1);

namespace Renttek\BitbucketWebhookTypes\Entity;

enum ParticipantRole: string
{
    case REVIEWER = 'REVIEWER';
    case PARTICIPANT = 'PARTICIPANT';
}
