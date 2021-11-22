<?php

declare(strict_types=1);

/*
 Toujours dans l'idée de ne pas me fermer à des évolutions futures,
  j'ai choisi de placer l'ensemble de mes classes dans un répertoire source nommé src.
   Pour faire fonctionner le chargement automatisé, j'ai considéré App comme un Alias de src.
 */

spl_autoload_register(static function (string $fqcn): void {
    $path = sprintf('%s.php', str_replace(['App', '\\'], ['src', '/'], $fqcn));
    require_once $path;
});

use App\MatchMaker\Lobby;
use App\MatchMaker\Player\Player;

$greg = new Player('greg');
$jade = new Player('jade');

$lobby = new Lobby();
$lobby->addPlayers($greg, $jade);

var_dump($lobby->findOponents($lobby->queuingPlayers[0]));

exit(0);
