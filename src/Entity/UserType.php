<?php

declare(strict_types=1);

namespace Renttek\BitbucketWebhookTypes\Entity;

enum UserType: string
{
    case USER = 'user';
    case TEAM = 'team';
    case APP_USER = 'app_user';
}
