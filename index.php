<?php

declare(strict_types=1);

class Pont
{
    private float $longueur;
    private float $largeur;

    public function __construct(float $longueur, float $largeur)
    {
        $this->longueur = $longueur;
        $this->largeur = $largeur;
    }

    public function setLongueur(float $longueur): void
    {
        $this->longueur = $longueur;
    }

    public function setLargeur(float $largeur): void
    {
        $this->largeur = $largeur;
    }
}

$towerBridge = new Pont(286.0, 62.0);
$towerBridge->setLongueur(286.0);
$towerBridge->setLargeur(62.2);

//---------------------------------------------------------------------------------------

class PontPHP8
{
    public function __construct(private float $longueur, private float $largeur)
    {
    }
}

$towerBridge8 = new PontPHP8(286.0, 62.0);
