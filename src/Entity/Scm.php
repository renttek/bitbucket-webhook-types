<?php

declare(strict_types=1);

namespace Renttek\BitbucketWebhookTypes\Entity;

enum Scm: string
{
    case GIT = 'git';
    case MERCURIAL = 'hg';
}
