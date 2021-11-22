<?php
// php8

declare(strict_types=1);

namespace Forum;

class Message
{
}

namespace Messenger;

class Message
{
}

$forumMessage = new \Forum\Message;
$messengerMessage = new \Messenger\Message;

var_dump($forumMessage::class);
var_dump($messengerMessage::class);
