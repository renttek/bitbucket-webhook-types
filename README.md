# Bitbucket Webhook Types

This library provides a converter as well as value objects for the bitbucket webhook payloads.

## Installation

The module can be asily installed using composer:

```
composer require renttek/bitbucket-webhook-types
```

## Usage

```php
$pullRequestCreatedPayload = '<webhook json here>';

$converter = new \Renttek\BitbucketWebhookTypes\Converter();

$pullRequestCreated = $converter->fromJson(
    \Renttek\BitbucketWebhookTypes\EventPayload\PullrequestCreated::class,
    $pullRequestCreatedPayload
)
```

### Using a custom mapper/configuration

The converter is built using `cuyz/valinor` and if you want to use a custom mapper, instead of the default one, you can
pass a mapper to the constructor of `\Renttek\BitbucketWebhookTypes\Converter`:

```php
$pullRequestCreatedPayload = '<webhook json here>';

$myAwesomeMapper = (new MapperBuilder())
    ->supportDateFormats('Y-m-d\TH:i:s.uP')
    ->infer(
        ...
    )
    ->registerConstructor(
        ...
    )
    ->allowSuperfluousKeys()
    ->mapper();

$converter = new \Renttek\BitbucketWebhookTypes\Converter($myAwesomeMapper);

$pullRequestCreated = $converter->fromJson(
    \Renttek\BitbucketWebhookTypes\EventPayload\PullrequestCreated::class,
    $pullRequestCreatedPayload
)
```

## Credits & thank you

I'd like to thank Team CuyZ and all the contributors for valinor!
