<?php 
	session_start();
	if(!isset($_SESSION['journal_user']))
	{
		header('Location:login.php');
	}
	require_once('../fonction/User.class.php');	
	require_once('../fonction/Art.class.php');
	require_once('../fonction/ArtDB.class.php');
	require_once('../fonction/UtilDb.class.php');
	
	$base=new UtilDb();
	$connect=$base->getConnection();
	$ArtDB=new ArtDB($connect);

	if(isset($_POST['submit']))
	{
		if(isset($_POST["idCategorie"])&& isset($_POST["idJournal"])&& isset($_POST["idAuteur"]) && isset($_POST["titreArticle"])&& isset($_POST["textArticle"]))
		{
			$idArticle=intval($_POST["idArticle"]);
			$idCategorie= intval($_POST["idCategorie"]);
			$idJournal=intval($_POST["idJournal"]);
			$idAuteur= intval($_POST["idAuteur"]);
			$idPublieur=intval($_SESSION['journal_user']['idUser']);
			$nomImage=$_FILES['fichier']['name'];
			if($nomImage==null){
				$nomImage=$_POST["nomImage"];
			}
			else include ('../fonction/upload.php');
			$titreArticle=htmlspecialchars(trim($_POST["titreArticle"]));
			$textArticle=$_POST["textArticle"];
			$ArtDB->updateArticle($idArticle,$idCategorie,$idJournal,$idAuteur,$idPublieur,$nomImage,$titreArticle,$textArticle);
			header('Location: archive.php');
		}
	}
	
?>