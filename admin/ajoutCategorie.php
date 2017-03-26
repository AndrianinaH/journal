<?php 
  session_start();
  if(!isset($_SESSION['journal_user']))
  {
  	header('Location:login.php');
  }
 	require_once('../fonction/User.class.php');
	require_once('../fonction/Categorie.class.php');
	require_once('../fonction/CategorieDB.class.php');
	require_once('../fonction/UtilDb.class.php');
	
	$base=new UtilDb();
	$connect=$base->getConnection();
	$CategorieDB=new CategorieDB($connect);
	if(isset($_GET["id"]))
	{
		$CategorieDB->destroyCategorie($_GET["id"]);
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
		<script type="text/javascript" src="../css/bootstrap/js/jquery-3.1.1.min.js"></script>
		<script type="text/javascript" src="../css/bootstrap/js/bootstrap.min.js"></script>
		<link rel="icon" type="image/png" href="../images/header_footer/logoJournal.png" />
		
		<meta name="viewport" content="width=device-width">	
	</head>
	<body>
		<?php include ('header.php'); ?>
		<section>	
			<ul>
			    <li class="title">Les Catégories</li>
			</ul>
		</section>
		<section class="conteneur">
			<div id="interne">
				<h3>Ajout d'une catégorie</h3>
				
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
					<div class="form-group" style="width:30%;">
						<div class="form-group">
						    <label for="idUne">nom de la nouvelle catégorie</label>
						</div>
						<div class="form-group">
						    <input  class="form-control" type="text" name="categorie"  value="" required />
						</div>
						<h5 style="color:red">
							<?php if(isset($_POST["categorie"]))
							{
								$CategorieDB->createCategorie($_POST["categorie"]);
							}
							?>
						</h5>
					</div>
				    <p>
				    	<button type="submit" class="btn btn-primary">
				    		<span class="glyphicon glyphicon-saved"></span> Enregistrer
				    	</button>
					</p>
				</form>
				<div>
					<br>
					<h4>Liste des catégories</h4>
					<div class="table-responsive">
				        <table class="table table-hover" id="mytable">
				            <thead>
				                <tr>
				                    <th>numero</th>
				                    <th>catégorie</th>
				                </tr>
				            </thead>
				            <tbody>
				            	<?php 
				            	$allCategorie=$CategorieDB->getAllCategorie();
				      
				            	foreach($allCategorie AS $new) { 
				       			?>
				                <tr>
				                    <td><?php echo $new->idCategorie;?></td>
				                    <td><?php echo $new->nomCategorie?></td>
				                    <td>
				                    	
				                       <p>
				                       		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>?id=<?php echo $new->idCategorie;?>" method="POST">
					                       		<input type="text" name="destroy" style="display:none;" value="oui" />
										    	<button type="submit" class="btn btn-danger">
										    		<span class="glyphicon glyphicon-trash"></span> Supprimer
										    	</button>
									    	</form>
										</p>
			                        
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
