<?php

declare(strict_types=1);

namespace Renttek\BitbucketWebhookTypes\Entity;

readonly class CommentInline
{
    public function __construct(
        public ?int $from,
        public ?int $to,
        public string $path,
        public bool $outdated,
        public string $contextLines,
    ) {
    }
}
