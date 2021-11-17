<?php

declare(strict_types=1);

abstract class User //Imposez l'héritage d’une classe
{
    public const STATUS_ACTIVE = 'active';
    public const STATUS_INACTIVE = 'inactive';

    public string $email;
    public string $status;

    public function __construct(string $email, string $status = self::STATUS_ACTIVE)
    {
        $this->email = $email;
        $this->status = $status;
    }

    public function setStatus(string $status): void
    {
        assert(
            in_array($status, [self::STATUS_ACTIVE, self::STATUS_INACTIVE]),
            sprintf(
                'Le status %s n\'est pas valide. Les status possibles sont : %s',
                $status,
                implode(',', [self::STATUS_ACTIVE, self::STATUS_INACTIVE])
            )
        );

        $this->status = $status;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    // cette méthode doit exister dans les classes enfants, sans dire comment elle fonctionne
    abstract public function getUsername(): string;
}

final class Admin extends User // Empêchez l'héritage
{

    public $roles = [];

    // Ajout d'un tableau de roles pour affiner les droits des administrateurs :)
    public function __construct(string $email, string $status = self::STATUS_ACTIVE, array $roles = [])
    {
        parent::__construct($email, $status);
        $this->roles = $roles;
    }

    // ...

    public function getUsername(): string
    {
        return $this->email;
    }
}

class Player extends User
{
    public string $username;
    // Ajout username :)
    public function __construct(string $email, string $username, string $status = self::STATUS_ACTIVE)
    {
        parent::__construct($email, $status);
        $this->username = $username;
    }

    // ...

    public function getUsername(): string
    {
        return $this->username;
    }
}

$admin = new Admin('root@admin.net');
//var_dump($admin);
//echo $admin->getUsername();
$player = new Player('player@admin.net', 'MyPlayer');
//var_dump($player);
echo $player->getUsername();
