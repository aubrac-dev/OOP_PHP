<?php
/*
$date0 = new DateTime;

// déclaration par référence avec le symbole &
function foo($var)
{
    $var = 2;
}


$a = 1;
foo($a);
//echo $a;
// $a vaut toujours 1

//-----------------------

// déclaration par référence avec le symbole &
function foo1(&$var)
{
    $var = 2;
}

$a = 1;
foo1($a);
//echo $a;
// $a vaut 2 maintenant

//------------------------

// déclaration de référence à l’objet
function foo2(DateTime $date)
{
    $date->modify('+1 day'); // permet d'ajouter 1 jour à la date
}

$date = new DateTime;
foo2($date);
// $date est maintenant au lendemain

//---------------------------

$dateUne = new DateTime;
$dateDeux = $dateUne;

$dateDeux->modify('+1 day');

//var_dump($dateUne, $dateDeux);

// $dateUne et $dateDeux désignent le même objet en mémoire.
// Ils sont donc tous les deux au lendemain

//--------------------

$date = new DateTime;
//echo $date->format('d/m/Y');

//-------------------------------

// D’abord, l’exemple sans chaînage :
$date = new DateTime;
$newDate = $date->modify('+1 day');

//echo $date->format('d/m/Y') . PHP_EOL;
//echo $newDate->format('d/m/Y') . PHP_EOL;

// Maintenant avec le chaînage. Nous exploitons directement
// l'objet qui nous est retourné sans le stocker dans une variable :
$formatedDate = $date->modify('+1 day')->format('d/m/Y');
//echo $formatedDate . PHP_EOL;

//-------------------

$date = new DateTime;
$newDate = $date->modify('+1 day');

//echo $date->modify('+1 day')->format('d/m/Y') . PHP_EOL;
//echo $newDate->format('d/m/Y') . PHP_EOL;

//------------------------------

$date = new DateTimeImmutable;
$newDate = $date->modify('+1 day');

//echo $date->format('d/m/Y') . PHP_EOL;
//echo $newDate->format('d/m/Y') . PHP_EOL;

//-------------------------------------


$s = <<<JSON
{
    "date":"2021-03-23 07:35:44.011207",
    "timezone_type":3,
    "timezone":"Europe/Paris"
}
JSON;

//var_dump(json_decode($s));
//=========================================================================================
class NomDeLaClasse
{
}
*/

declare(strict_types=1); //  demandant à PHP d'être exigeant avec le typage

class Pont
{
    public float $longueur;
    public float $largeur;

    public function getSurface(): float
    {
        return $this->longueur * $this->largeur;
    }
}

$pont = new Pont;
$pont->longueur = 286.0;
$pont->largeur = 15.0;

$surface = $pont->getSurface();

var_dump($surface);
