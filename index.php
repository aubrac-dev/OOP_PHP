<?php

declare(strict_types=1);
/*
namespace Forum;

class Message
{
}

namespace Messenger;

class Message
{
}

$forumMessage = new \Forum\Message;
$messengerMessage = new Message;
$date = new \DateTime();

echo get_class($forumMessage);
echo '<br>';
echo get_class($messengerMessage);

*/

namespace App\Domain\Messenger {
    class Message
    {
    }
}

namespace {

    use App\Domain\Messenger\Message;

    echo class_exists(Message_1::class);
    echo '<br>';
    echo class_exists(Message::class);
    echo '<br>';
    $messengerMessage = new Message;
    echo get_class($messengerMessage);
}
