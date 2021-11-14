<?php

declare(strict_types=1);

class User
{
    public const STATUS_ACTIVE = 'active';
    public const STATUS_INACTIVE = 'inactive';

    public string $username;
    public string $status;

    public function __construct(string $username, string $status = self::STATUS_ACTIVE)
    {
        $this->username = $username;
        $this->status = $status;
    }

    public function setStatus(string $status): void
    {
        if (!in_array($status, [self::STATUS_ACTIVE, self::STATUS_INACTIVE])) {
            trigger_error(sprintf(
                'Le status %s n\'est pas valide. Les status possibles sont : %s',
                $status,
                implode(', ', [self::STATUS_ACTIVE, self::STATUS_INACTIVE])
            ), E_USER_ERROR);
        };
        $this->status = $status;
    }

    public function getStatus(): string
    {
        return $this->status;
    }
}

class Admin extends User
{
    public array $roles;

    // Ajout d'un tableau de roles pour affiner les droits des administrateurs :)
    public function __construct(string $username, array $roles = [], string $status = self::STATUS_ACTIVE)
    {
        $this->username = $username;
        $this->roles = $roles;
        $this->status = $status;
    }
    // Méthode d'ajout d'un rôle, puis on supprime les doublons avec array_unique.
    public function addRole(string $role): void
    {
        $this->roles[] = $role;
        $this->roles = array_unique($this->roles);
    }
    // Méthode de renvoie des rôles, dans lequel on définit le rôle ADMIN par défaut.
    public function getRoles(): array
    {
        $roles = $this->roles;
        $roles[] = 'ADMIN';

        return $roles;
    }

    public function setRoles(array $roles): void
    {
        $this->roles = $roles;
    }
}

$rl = [];
$rl[] = 'MASTER';
$admin1 = new Admin('root');
//var_dump($admin1);
$admin1->addRole('GROUP');
$admin1->addRole('SUPERVISOR');
$admin1->addRole('GROUP');
$admin1->setStatus(User::STATUS_INACTIVE);
print_r($admin1->getRoles());
var_dump($admin1);
$admin1->setRoles($rl);
$admin1->setStatus(User::STATUS_ACTIVE);
print_r($admin1->getRoles());
var_dump($admin1);


/*
// array 
 $roles = [];
 print_r($roles);
 $roles [] = 'a';
 print_r($roles);
 $roles [] = 'b';
 print_r($roles);
 $roles [] = 'b';
 print_r($roles);
 $roles [] = 'c';
 print_r($roles);
 $roles [] = array_unique($roles);
 print_r($roles);
*/