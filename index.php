<?php

spl_autoload_register(static function (string $fqcn) {
    // $fqcn contient Domain\Forum\Message
    // remplaçons les \ par des / et ajoutons .php à la fin.
    // on obtient Domain/Forum/Message.php
    $path = str_replace('\\', '/', $fqcn) . '.php';

    // puis chargeons le fichier
    require_once($path);
});

use Domain\Forum\Message;

$forumMessage = new Message;
