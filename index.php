<?php

declare(strict_types=1);

/*
//PHP7
class MessagePrinter
{
    public static function printMessage($message)
    {
        echo sprintf('%s %s', $message->getContent(), $message->getAuthor()->name);
    }
}

//PHP8
use Domain\Forum\Message as ForumMessage;
use Domain\Messenger\Message as MessengerMessage;


class MessagePrinter
{
    public static function printMessage(ForumMessage|MessengerMessage $message)
    {
        echo sprintf('%s %s', $message->getContent(), $message->getAuthor()->name);
    }
}

*/
// Mais ça ne résout pas vraiment le problème de fond. Si demain une nouvelle classe de message vient s'ajouter, 
// et que je veux pouvoir l'afficher, je vais devoir venir modifier   printMessage  pour y ajouter une classe... 
// Si j'en ai 10, je dois mettre les 10 ? C'est là qu'entre en jeu l'interface.


namespace Domain\Display;


use Domain\User\User;


interface MessageInterface
{
    public function getContent(): string;
    public function getAuthor(): User;
}


class MessagePrinter
{
    public static function printMessage(MessageInterface $message)
    {
        echo sprintf('%s %s', $message->getContent(), $message->getAuthor()->name);
    }
}
