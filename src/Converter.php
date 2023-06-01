<?php

declare(strict_types=1);

namespace Renttek\BitbucketWebhookTypes;

use CuyZ\Valinor\Mapper\MappingError;
use CuyZ\Valinor\Mapper\Source\Exception\InvalidSource;
use CuyZ\Valinor\Mapper\Source\Source;
use CuyZ\Valinor\Mapper\TreeMapper;
use CuyZ\Valinor\MapperBuilder;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Renttek\BitbucketWebhookTypes\Exception\CouldNotConvertToObject;
use Renttek\BitbucketWebhookTypes\Exception\InvalidClassName;
use Renttek\BitbucketWebhookTypes\Exception\InvalidJsonString;
use Symfony\Component\Uid\Uuid;

class Converter
{
    public function __construct(
        private ?TreeMapper $mapper = null
    ) {
    }

    /**
     * @template T of object
     *
     * @param class-string<T> $class
     *
     * @return T
     *
     * @throws CouldNotConvertToObject
     * @throws InvalidClassName
     * @throws InvalidJsonString
     * @throws InvalidSource
     */
    public function fromJson(string $class, string $json): object
    {
        $this->assertValidClassName($class);
        $this->assertValidJson($json);

        $source = Source::json($json)->camelCaseKeys();

        return $this->fromSource($class, $source);
    }

    /**
     * @template T of object
     *
     * @param class-string<T> $class
     *
     * @return T
     *
     * @throws InvalidClassName
     */
    private function fromSource(string $class, Source $source): object
    {
        $this->assertValidClassName($class);

        try {
            return $this->getMapper()->map($class, $source);
        } catch (MappingError $error) {
            throw CouldNotConvertToObject::fromMappingError($error);
        }
    }

    private function getMapper(): TreeMapper
    {
        return $this->mapper ??= (new MapperBuilder())
            ->supportDateFormats('Y-m-d\TH:i:s.uP')
            ->infer(
                Collection::class,
                static fn () => ArrayCollection::class . '<string, ' . implode('|', [
                    Entity\Link::class,
                    Entity\Participant::class,
                    Entity\User::class,
                ]) . '>',
            )
            ->registerConstructor(
                /** @psalm-pure */
                function (string $uuid): Uuid {
                    $uuid = str_replace(['{', '}'], ['', ''], $uuid);
                    return Uuid::fromString($uuid);
                },
            )
            ->allowSuperfluousKeys()
            ->mapper();
    }

    /**
     * @throws InvalidJsonString
     */
    private function assertValidJson(string $json): void
    {
        json_decode($json);
        $errorCode = json_last_error();

        if ($errorCode !== JSON_ERROR_NONE) {
            throw InvalidJsonString::fromJsonErrorCode($errorCode);
        }
    }

    /**
     * @param class-string $class
     *
     * @throws InvalidClassName
     */
    private function assertValidClassName(string $class): void
    {
        if (!class_exists($class)) {
            /** @psalm-suppress MixedArgument */
            throw InvalidClassName::classDoesNotExist($class);
        }
    }
}
