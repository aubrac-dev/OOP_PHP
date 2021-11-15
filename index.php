<?php

declare(strict_types=1);

class User
{
    public const STATUS_ACTIVE = 'active';
    public const STATUS_INACTIVE = 'inactive';

    public static $nombreUtilisateursInitialisés = 0;

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

    public function printStatus()
    {
        echo $this->status;
    }
}

class Admin extends User
{
    public static $nombreAdminInitialisés = 0;

    public array $roles;

    public const STATUS_LOCKED = 'locked';

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

    /* public function printStatus()
    {
        // vous pouvez accéder au statut comme si la propriété appartenait à Admin :)
        echo $this->status;
    }*/

    // mise à jour des valeurs des propriétés statiques de la classe courante avec `self`, et de la classe parente avec `parent`
    public static function nouvelleInitialisation()
    {
        self::$nombreAdminInitialisés++; // classe Admin
        parent::$nombreUtilisateursInitialisés++; // classe User
    }

    public function printCustomStatus()
    {
        echo "L'administrateur {$this->username} a pour statut : ";
        $this->printStatus(); // on appelle printStatus du parent depuis la classe enfant
    }

    // la méthode est entièrement réécrite ici :) seule la signature reste inchangée
    public function setStatus(string $status): void
    {
        if (!in_array($status, [self::STATUS_ACTIVE, self::STATUS_INACTIVE, self::STATUS_LOCKED])) {
            trigger_error(sprintf(
                'Le status %s n\'est pas valide. Les status possibles sont : %s',
                $status,
                implode(', ', [self::STATUS_ACTIVE, self::STATUS_INACTIVE, self::STATUS_LOCKED])
            ), E_USER_ERROR);
        };

        $this->status = $status;
    }

    // la méthode utilisée est celle de la classe parente, puis ajoute un comportement :)
    public function getStatus(): string
    {
        return strtoupper(parent::getStatus());
    }
}

/*
$admin = new Admin('Maria');
$admin->printStatus();

Admin::nouvelleInitialisation();
var_dump(Admin::$nombreAdminInitialisés, Admin::$nombreUtilisateursInitialisés, User::$nombreUtilisateursInitialisés);
// var_dump(User::$nombreAdminInitialisés); // ceci ne marche pas.
*/

/*
$admin = new Admin('Lily');
$admin->printCustomStatus(); // Affiche “L’administrateur Lily a pour statut : active”
$admin->printStatus(); // printStatus n’existe pas dans la classe Admin, donc printStatus de la classe User sera appelée grâce à l’héritage
*/

$admin = new Admin('Paddington');
$admin->setStatus(Admin::STATUS_LOCKED);
echo $admin->getStatus();
