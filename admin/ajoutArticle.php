<?php 
	session_start();
	if(!isset($_SESSION['journal_user']))
	{
		header('Location:login.php');
	}
	require_once('../fonction/User.class.php');
	require_once('../fonction/Article.class.php');
	require_once('../fonction/Auteur.class.php');
	require_once('../fonction/ArticleDB.class.php');
	require_once('../fonction/Categorie.class.php');
	require_once('../fonction/CategorieDB.class.php');
	require_once('../fonction/Art.class.php');
	require_once('../fonction/ArtDB.class.php');
	require_once('../fonction/Journal.class.php');
	require_once('../fonction/JournalDB.class.php');
	require_once('../fonction/UtilDb.class.php');
	include ('../fonction/upload.php');
	$today = new DateTime();
	$day=(string)$today->format('Y-m-d');

	$base=new UtilDb();
	$connect=$base->getConnection();
	$ArticleDB=new ArticleDB($connect);
	$CategorieDB=new CategorieDB($connect);
	$JournalDB=new JournalDB($connect);
	$ArtDB=new ArtDB($connect);
	$allCat=$CategorieDB->getAllCategorie();
	$allJournal=$JournalDB->getAllJournal();
	$AllAuteur=$ArtDB->getAllAuteur();

	if(isset($_POST['submit']))
	{
		if(isset($_POST["idCategorie"])&& isset($_POST["idJournal"])&& isset($_POST["idAuteur"]) && isset($_POST["titreArticle"])&& isset($_POST["textArticle"]))
		{
			$idCategorie= intval($_POST["idCategorie"]);
			$idJournal=intval($_POST["idJournal"]);
			$idAuteur= intval($_POST["idAuteur"]);
			$idPublieur=intval($_SESSION['journal_user']['idUser']);
			$nomImage=$_FILES['fichier']['name'];
			$titreArticle=htmlspecialchars(trim($_POST["titreArticle"]));
			$textArticle=$_POST["textArticle"];
			$ArtDB->createArticle($idCategorie,$idJournal,$idAuteur,$idPublieur,$nomImage,$titreArticle,$textArticle);
			header('Location:archive.php');
		}
	}
	
?>
<!doctype html>
<html>
	<head>
	
		<title>Journal Page Admin</title>
	   	<meta charset="UTF-8">
		<link rel="stylesheet"  style="text/css" href="../css/admin.min.css">
		<link rel="stylesheet"  style="text/css" href="../css/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet"  style="text/css" href="../css/bootstrap/css/font-awesome.min.css">
		<link rel="icon" type="image/png" href="../images/header_footer/logoJournal.png" />
		
		<meta name="viewport" content="width=device-width">	
	</head>
	<body>
		<?php include ('header.php'); ?>
		<section>	
			<ul>
			    <li class="title">Création Article</li>
			</ul>
		</section>
		<section class="conteneur">
			<div id="interne">
				<h3>Créer un Article</h3>
				<div>
					<br>
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" enctype="multipart/form-data">
						<div class="form-group" style="width:90%;">
							<div id="blockAjout">
								<div id="ajoutArt">
									<div class="form-group">
									    <label for="idCategorie">Catégorie</label>
										<select class="form-control" name="idCategorie" id="idCategorie" required>
										<?php foreach ($allCat as $cat) {?>
											<option value="<?php echo $cat->idCategorie;?>"><?php echo $cat->nomCategorie;?></option>
										<?php }?>
										</select>
									</div>
									<div class="form-group">
									    <label for="journal">Journal du</label>
									    <select class="form-control" name="idJournal" id="journal" required>
										<?php foreach ($allJournal as $new) {?>
										<option value="<?php echo $new->idJournal;?>"><?php echo $base->moisEnLettre($new->dateJournal);?></option>
										<?php }?>
										</select>
									</div>
								</div>
								<div id="uploadImg">
									<div class="form-group">
									    <label for="idAuteur">Auteur</label>
									    <select class="form-control" name="idAuteur" id="idAuteur" required>
										<?php foreach ($AllAuteur as $auteur) {?>
										<option value="<?php echo $auteur->idAuteur;?>"><?php echo $auteur->nomAuteur;?></option>
										<?php }?>
										</select>
									</div>
									<label for="fichier">Image</label>
									<input type="hidden"name="MAX_FILE_SIZE"value="1000000">
									<input type="file" name="fichier" required>
								</div>
							</div>
							<div class="form-group">
							    <label for="titreArticle">Titre</label>
							    <input type="text" name="titreArticle" class="form-control" value="" id="titreArticle" placeholder="Le titre de votre article" required>
							</div>
							<div class="form-group">
								<label for="textArticle">Contenu de l'article</label>
								<textarea id="textArticle" name="textArticle"></textarea>
							</div>
						</div>
					    <p>
					    	<button type="submit" class="btn btn-primary" name="submit">
					    		<span class="glyphicon glyphicon-saved"></span> Enregistrer
					    	</button>
						</p>
						<br>
						<br>
					</form>
					
				</div>
			</div>	
		</section>				
	</body>
</html>
<script type="text/javascript" src="../css/bootstrap/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="../css/bootstrap/js/bootstrap.min.js"></script>
<script src="//cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>
<script>
var i = 0;
	$('#cli').click(function(){	 	
	 	if(i==0)
	 	{
	 		$("#menulateral").attr("style","top:155px;transition: all 0.2s");
	 		i=1;
	 	} 
	 	else
	 	{	 		
	 		$("#menulateral").attr("style","top:70px;transition: all 0.2s;");
	 		i=0;
	 	}	
    });
  	CKEDITOR.replace( 'textArticle');
    
				
</script>
