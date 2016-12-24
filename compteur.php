<?php
//-------- scripte php crée par pubs1896 ---------------
session_start();

error_reporting(E_ALL);

$uurl1 = $_SERVER['SERVER_NAME'];

$uurl = htmlspecialchars($_GET["name"]) ;

if(file_exists(''.$uurl.'.txt'))
{
        $compteur_f = fopen(''.$uurl.'.txt', 'r+');
        $compte = fgets($compteur_f);
}
else
{
		$compteur_f = fopen(''.$uurl.'.txt', 'w+');
        $compteur_f = fopen(''.$uurl.'.txt', 'a+');
        $compte = 0;
		$compteur_f = fopen(''.$uurl.'.txt', 'r+');
        fputs($compteur_f, $compte);
}
if(!isset($_SESSION['compteur_de_visite']))
{
        $_SESSION['compteur_de_visite'] = 'visite';
        $compte++;
        fseek($compteur_f, 0);
		$compteur_f = fopen(''.$uurl.'.txt', 'r+');
        fputs($compteur_f, $compte);
}
fclose($compteur_f);

$compte = $_SESSION ["var"]; 

header ("Content-type: image/png");
$image = imagecreate(200,50);

$orange = imagecolorallocate($image, 255, 128, 0);
$bleu = imagecolorallocate($image, 0, 0, 255);
$bleuclair = imagecolorallocate($image, 156, 227, 254);
$noir = imagecolorallocate($image, 0, 0, 0);
$blanc = imagecolorallocate($image, 255, 255, 255);

if(file_exists(''.$uurl.'.txt'))
{
        $compteur_f = fopen(''.$uurl.'.txt', 'r+');
        $compte = fgets($compteur_f);
}
else
{
		$compteur_f = fopen(''.$uurl.'.txt', 'w+');
        $compteur_f = fopen(''.$uurl.'.txt', 'a+');
        $compte = 0;
}
if(!isset($_SESSION['compteur_de_visite']))
{
        $_SESSION['compteur_de_visite'] = 'visite';
        $compte++;
        fseek($compteur_f, 0);
        fputs($compteur_f, $compte);
}
fclose($compteur_f);

$compte = $_SESSION ["var"]; 

        $compteur_f = fopen(''.$uurl.'.txt', 'r+');
        $compte = fgets($compteur_f);
		$comptetexte = $compte;

imagestring($image, 30, 5, 25, $compte, $noir);
imagecolortransparent($image, $orange); // On rend le fond orange transparent

imagepng($image);

?>
