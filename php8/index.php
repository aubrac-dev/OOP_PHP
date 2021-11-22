<?php

spl_autoload_register(static function ($fqcn) {
    $path = str_replace(['App', '\\'], ['src', '/'], $fqcn) . '.php';
    require_once $path;
});

//require_once('Domain/Forum/Message.php');
//require_once('Domain/User/User.php');

use App\Domain\Forum\Message;
use App\Domain\User\User;

$user = new User;
$user->name = 'Greg';

$forumMessage = new Message($user, 'J\'aime les pates.');

var_dump($forumMessage);
