<?php

declare(strict_types=1);

class Pont
{
    // ous avons renommé $unite en UNITE : les constantes ne sont pas préfixées par $ et par convention sont écrites en UPPER_SNAKE_CAS
    private const UNITE = 'm²';  // constante de classe s’écrit avec le mot-clé const est une valeur lui est donnée directement

    private float $longueur;
    private float $largeur;

    public function getSurface(): string
    {
        // Une constante est statique, on utilise le mot-clé self pour l’utiliser
        return ($this->longueur * $this->largeur) . self::UNITE;
    }

    // setLongueur et setLargeur ne changent pas

    /*Pour utiliser une méthode sans instance, elle doit être déclarée statique 
    et nous ferons attention de manipuler uniquement des propriétés statiques.
    Lorsqu’une propriété est déclarée statique, la valeur qu’elle contient 
    sera partagée pour toutes les instances.*/

    public static function validerTaille(float $taille): bool
    {
        if ($taille < 50.0) {
            trigger_error(
                'La longueur est trop courte. (min 50m)',
                E_USER_ERROR
            );
        }

        return true;
    }

    public function setLongueur(float $longueur): void
    {
        self::validerTaille($longueur); // Vous devez utiliser le mot clé self pour cibler une méthode statique 
        // de classe, lorsque vous l'appelez depuis une instance de cette même classe.
        $this->longueur = $longueur;
    }

    // self - utilite

    // Définition de la propriété statique. Elle sera partagée
    public static int $nombrePietons = 0;

    // Je laisse volontairement la méthode non statique.
    // Seule la référence à la propriété est importante.
    public function nouveauPieton()
    {
        // Mise à jour de la propriété statique.
        self::$nombrePietons++;
    }
}

var_dump(Pont::validerTaille(150.0));
//var_dump(Pont::validerTaille(20.0));

/*
Pont fait référence à la classe or, rappelez-vous, -> permet d'accéder aux éléments d'un objet, 
c'est-à-dire d'une instance. 

Pour dire à PHP que nous souhaitons faire référence à un élément de la classe, 
il faut utiliser ::  à la place, comme pour les constantes. Sans ceci, il va chercher 
à utiliser la méthode d'un objet contenu dans une constante nommée Pont. Ce qui est faux dans notre cas.
*/

$towerBridge = new Pont;
//$towerBridge->setLongueur(20.0);

// ----------------------------------------------
//En définissant une propriété statique, vous allez pouvoir manipuler
// une même donnée à travers toutes les instances.

$pontLondres = new Pont;
$pontLondres->nouveauPieton();

$pontManhattan = new Pont;
$pontManhattan->nouveauPieton();

echo Pont::$nombrePietons;
