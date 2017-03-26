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

	//modifier Article
	$idArt=0;
	if(isset($_GET["idArt"]))
	{
		$idArt=$_GET["idArt"];
	}
	//L'article à modifier
	$monArticle=$ArticleDB->getArticle($idArt);
	$idAr=intval($monArticle[0]->idArticle);
	$idCat= intval($monArticle[0]->idCategorie);
	$idJourn=intval($monArticle[0]->idJournal);
	$idAut= intval($monArticle[0]->idAuteur);
	$nomImg=$monArticle[0]->nomImage;
	$titreArt=$monArticle[0]->titreArticle;
	$textArt=$monArticle[0]->textArticle;
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
			    <li class="title">Modification Article</li>
			</ul>
		</section>
		<section class="conteneur">
			<div id="interne">
				<h3>Modifier un Article</h3>
				<div>
					<br>
					<form action="updateArticle.php" method="POST" enctype="multipart/form-data">
						<div class="form-group" style="width:90%;">
							<div id="blockAjout">
								<div id="ajoutArt">
									<div class="form-group">
										<input type="number" name="idArticle" value="<?php echo $idAr; ?>" style="display:none" required>
										<input type="text" name="nomImage" value="<?php echo $nomImg; ?>" style="display:none" required>
									    <label for="idCategorie">Catégorie</label>
										<select class="form-control" name="idCategorie" id="idCategorie" required>
										<?php foreach ($allCat as $cat) {
												if($cat->idCategorie==$idCat){
										?>	
													<option selected="selected" value="<?php echo $cat->idCategorie;?>"><?php echo $cat->nomCategorie;?></option>	
										<?php 	}else{
										?>
													<option value="<?php echo $cat->idCategorie;?>"><?php echo $cat->nomCategorie;?></option>			
										<?php 	}
											  }
										?>
										</select>
									</div>
									<div class="form-group">
									    <label for="journal">Journal du</label>
									    <select class="form-control" name="idJournal" id="journal" required>
										<?php foreach ($allJournal as $new) {
												if($new->idJournal==$idJourn){	
										?>
													<option  selected="selected" value="<?php echo $new->idJournal;?>"><?php echo $base->moisEnLettre($new->dateJournal);?></option>
										<?php 	}else{
										?>
													<option value="<?php echo $new->idJournal;?>"><?php echo $base->moisEnLettre($new->dateJournal);?></option>			
										<?php 	}
											  }
										?>
										</select>
									</div>
								</div>
								<div id="uploadImg">
									<div class="form-group">
									    <label for="idAuteur">Auteur</label>
									    <select class="form-control" name="idAuteur" id="idAuteur" required>
										<?php foreach ($AllAuteur as $auteur) {
												if($auteur->idAuteur==$idAut){	
										?>
													<option selected="selected" value="<?php echo $auteur->idAuteur;?>"><?php echo $auteur->nomAuteur;?></option>
										<?php 	}else{
										?>
													<option value="<?php echo $auteur->idAuteur;?>"><?php echo $auteur->nomAuteur;?></option>		
										<?php 	}
											  }
										?>
										</select>
									</div>
									<label for="fichier">Image</label>
									<img src="../images/<?php echo $nomImg;?>" class="img-thumbnail img_" alt="<?php echo $nomImg;?>" width="100px" height="236px">
									<input type="hidden"name="MAX_FILE_SIZE"value="1000000">
									<input type="file" name="fichier">
								</div>
							</div>
							<div class="form-group">
							    <label for="titreArticle">Titre</label>
							    <input type="text" name="titreArticle" class="form-control" value="<?php echo $titreArt; ?>" id="titreArticle" placeholder="Le titre de votre article" required>
							</div>
							<div class="form-group">
								<label for="textArticle">Contenu de l'article</label>
								<textarea id="textArticle" name="textArticle"><?php echo $textArt; ?></textarea>
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
