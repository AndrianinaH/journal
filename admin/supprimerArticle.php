<?php 
	session_start();
	if(!isset($_SESSION['journal_user']))
	{
		header('Location:login.php');
	}
	require_once('../fonction/Art.class.php');
	require_once('../fonction/ArtDB.class.php');
	require_once('../fonction/UtilDb.class.php');
	
	$base=new UtilDb();
	$connect=$base->getConnection();
	$ArtDB=new ArtDB($connect);

	if(isset($_GET["idArt"]))
	{
		$idArticle=intval($_GET["idArt"]);
		$ArtDB->deleteArticle($idArticle);
		header('Location: archive.php');
	
	}
	
?>