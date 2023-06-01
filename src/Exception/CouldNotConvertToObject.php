<?php

declare(strict_types=1);

namespace Renttek\BitbucketWebhookTypes\Exception;

use CuyZ\Valinor\Mapper\MappingError;
use RuntimeException;

class CouldNotConvertToObject extends RuntimeException
{
    public static function fromMappingError(MappingError $mappingError): self
    {
        return new self('Could not convert given JSON string to an object', previous: $mappingError);
    }
}
