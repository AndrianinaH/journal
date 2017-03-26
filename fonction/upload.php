<?php 
if(isset($_FILES['fichier']))
{
  $dossier = '../images/';
  $fichier = basename($_FILES['fichier']['name']);
  $taille_maxi = 100000;
  $taille = filesize($_FILES['fichier']['tmp_name']);
  $extensions = array('.png', '.jpg', '.jpeg');
  $extension = strrchr($_FILES['fichier']['name'], '.');
  //Début des vérifications de sécurité...
    if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans letableau
    {
    $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
    }
    if($taille>$taille_maxi)
    {
    $erreur = 'Le fichier est trop gros...';
    }
    if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
    {
    //On formate le nom du fichier ici...
    $fichier = strtr($fichier,
    'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
    'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
    $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
    if(move_uploaded_file($_FILES['fichier']['tmp_name'], $dossier.$fichier)) //Si la fonction renvoie TRUE,c'est que ça a fonctionné...
    {
    }
    else //Sinon (la fonction renvoie FALSE).
    {
     
    }
  }
  else
  {
    echo $erreur;
  }
}
?>
