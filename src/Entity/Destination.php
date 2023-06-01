<?php

declare(strict_types=1);

namespace Renttek\BitbucketWebhookTypes\Entity;

readonly class Destination
{
    public function __construct(
        public Branch $branch,
        public Commit $commit,
        public ReducedRepository $repository,
    ) {
    }
}
