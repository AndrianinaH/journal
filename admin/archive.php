<?php 
	session_start();
	if(!isset($_SESSION['journal_user']))
	{
		header('Location:login.php');
	}
	require_once('../fonction/User.class.php');
	require_once('../fonction/Article.class.php');
	require_once('../fonction/ArticleDB.class.php');
	require_once('../fonction/UtilDb.class.php');
	$today = new DateTime();
	$day=(string)$today->format('Y-m-d');

	$base=new UtilDb();
	$connect=$base->getConnection();
	$ArticleDB=new ArticleDB($connect);

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
			    <li class="title">Les archives</li>
			</ul>
		</section>
		<section class="conteneur">
			<div id="interne">
				<h3>Les archives</h3>
				<div>
					<br>
					<h4>Liste des articles</h4>
					<div class="table-responsive">
				        <table class="table table-hover" id="mytable">
				            <thead>
				                <tr>
				                    <th>id</th>
				                    <th>journal</th>
				                    <th>categorie</th>
				                    <th>auteur</th>
				                    <th>publieur</th>
				                    <th>nomImage</th>
				                    <th>titre</th>
				                    <th>texte</th>
				                </tr>
				            </thead>
				            <tbody>
				            	<?php 
				            	$arts=$ArticleDB->getAll();
				      
				            	foreach($arts AS $art) { 
				       			?>
				                <tr>
				                    <td><?php echo $art->idArticle;?></td>
				                    <td><?php echo $art->dateJournal;?></td>
				                    <td><?php echo $art->nomCategorie;?></td>
				                    <td><?php echo $art->nomAuteur;?></td>
				                    <td><?php echo $art->nomPublieur;?></td>
				                    <td><img src="../images/<?php echo $art->nomImage;?>" class="img-thumbnail img_" alt="<?php echo $art->nomImage;?>" width="100px" height="236px"></td>
				                    <td><?php echo $art->titreArticle?></td>
				                    <td><?php echo $ArticleDB->getExtrait($art->textArticle,110);?></td>
				                    <td>	
				                       <span>
				                       		<a href="modifierArticle.php?idArt=<?php echo $art->idArticle;?>" style="text-decoration:none;">
					                       		<button type="submit" class="btn btn-warning">
										    		<span class="glyphicon glyphicon-edit"></span> Modifier
										    	</button>
									    	</a>
										</span>
			                        </td>
			                        <td>
			                        	<span>
											<a href="supprimerArticle.php?idArt=<?php echo $art->idArticle;?>" style="text-decoration:none;">
											    	<button type="submit" class="btn btn-danger">
										    			<span class="glyphicon glyphicon-trash"></span> Supprimer
										    		</button>
										    	</a>
									    </span>
			                        </td>
				                </tr>
				   				<?php }?>
				            </tbody>
				        </table>
				    </div>
				</div>
			</div>	
		</section>				
	</body>
</html>
<script type="text/javascript" src="../css/bootstrap/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="../css/bootstrap/js/bootstrap.min.js"></script>
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
</script>
