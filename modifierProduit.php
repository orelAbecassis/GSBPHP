<?php
/** 
 * Script de contr�le et d'affichage du cas d'utilisation "Ajouter"
 * @package default
 * @todo  RAS
 */
 
 
// Initialise les ressources n�cessaires au fonctionnement de l'application

//   $repVues = './vues/';

include("tools/fonction.php"); 
  // d�marrage ou reprise de la session
//   ophp/n();
  // initialement, aucune erreur ...
  $tabErreurs = array();


// DEBUT du contr�leur rechercher.php 
$ID=$_GET['ID'];
if (count($_POST)==0)
{
    $etape = 1;
    $lacateg = listercat();
    $modif=listerProduitID($ID);
}
else
{
    $etape = 2;
    $uneRef=$_POST["ref"];
    $uneMarque=$_POST["marque"];
    $uneDimension=$_POST["dimension"];
    $unModele=$_POST["modele"];
    modifierProduit($uneRef, $uneMarque, $uneDimension, $unModele,$tabErreurs);
    header("Location:listerProduit.php");
    // Message de r�ussite pour l'affichage
    if (nbErreurs($tabErreurs)==0)
    {
      $reussite = 1;
      $messageActionOk = "Le produit a �t� correctement modifi�e";
    }
  
}

// D�but de l'affichage (les vues)

include("vues/entete.php");
include("vues/menu.php");

 

//   include("vues/vModifierVisiteur.php");

if($etape==1)
{
   include("vues/vModifierProduit.php");
}
include("vues/pied.php") ;
?>

