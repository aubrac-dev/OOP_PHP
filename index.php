<?php

declare(strict_types=1);

class Pont
{
    private const SURFACE_TEXT = 'Ce pont mesure %d m².';
    // private string $unite = ' m²';
    private float $longueur;
    private float $largeur;

    // appliquer le principe d’encapsulation avec set et get
    public function setLongueur(float $longueur): void  // setter / mutateur
    {
        if ($longueur < 0) {
            trigger_error(
                'La longueur est trop courte. (min 1)',
                E_USER_ERROR
            );
        }

        $this->longueur = $longueur;
    }

    public function setLargeur(float $largeur): void  // setter / mutateur
    {
        if ($largeur < 0) {
            trigger_error(
                'La longueur est trop courte. (min 1)',
                E_USER_ERROR
            );
        }

        $this->largeur = $largeur;
    }

    public function getLongueur(): float   // getter / accesseur
    {
        return $this->longueur;
    }

    public function getLargeur(): float // getter / accesseur
    {
        return $this->largeur;
    }

    public function getSurface(): string
    {
        return ($this->longueur * $this->largeur) . $this->unite;
    }

    public function printSurface(): void
    {
        echo sprintf(self::SURFACE_TEXT, $this->getSurface());
    }
}

$towerBridge = new Pont;
$towerBridge->setLongueur(500);
$towerBridge->setLargeur(80);

$towerBridge->printSurface();

// echo 'Pont en surface de ' . $towerBridge->getSurface() . ' pour longueur de ' . $towerBridge->getLongueur() . ' m et largeur de ' . $towerBridge->getLargeur() . ' m.';
