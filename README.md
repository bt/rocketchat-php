# rocketchat-php

This library allows you to easily create *Incoming Webhooks* in for [Rocket.Chat](http://rocket.chat) in PHP.

# Installing

The recommended way to install `rocketchat-php` is through [Composer](http://getcomposer.org/).

```
composer require bt/rocketchat-php
```

You can then use `rocketchat-php` with Composer's auto-loader.

```php
require 'vendor/autoload.php'
```

# Text Example

A getting started code snippet. This will post a message to the webhook:

```php
$client = new \RocketChatPhp\Client('https://demo.rocket.chat', 'webhook_token');
$client->payload([
    'text' => 'This will be sent to the webhook!'
]);
```

# Attachments

You can also add attachments to the message like follows:

```php
$attachments = new \RocketChatPhp\Attachments('The text to be displayed if the client cannot load the attachment.', '#ffffff');
$attachments->addField('Field Title', 'Field Value', true);
$attachments->addField('Field Title2', 'Field Value2', true);

$client = new \RocketChatPhp\Client('https://demo.rocket.chat', 'webhook_token');
$client->payload([
    'text' => 'This is a test message with attachments!',
    'attachments' => $attachments->toArray()
]);
```