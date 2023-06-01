<?php

declare(strict_types=1);

namespace Renttek\BitbucketWebhookTypes\Entity;

enum PullRequestState: string
{
    case OPEN = 'OPEN';
    case MERGED = 'MERGED';
    case DECLINED = 'DECLINED';
}
