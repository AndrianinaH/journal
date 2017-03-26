<?php 
	session_start();
	if(!isset($_SESSION['journal_user']))
	{
		header('Location:login.php');
	}
	require_once('../fonction/User.class.php');
	require_once('../fonction/Journal.class.php');
	require_once('../fonction/JournalDB.class.php');
	require_once('../fonction/UtilDb.class.php');
	$today = new DateTime();
	$day=(string)$today->format('Y-m-d');

	$base=new UtilDb();
	$connect=$base->getConnection();
	$JournalDB=new JournalDB($connect);
	if(isset($_POST["dateJ"]))
	{
		$jour=(string)$_POST["dateJ"];
		$JournalDB->createJournal($jour,0,'non' );

	}
	if(isset($_POST["publieOui"]))
	{
		$JournalDB->publierJournal($_GET["id"]);
	}
	if(isset($_POST["publieNon"]))
	{
		$JournalDB->NePaspublierJournal($_GET["id"]);
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
			    <li class="title">Création Journal</li>
			</ul>
		</section>
		<section class="conteneur">
			<div id="interne">
				<h3>Créer un Journal</h3>
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
					<div class="form-group" style="width:30%;">
					    <label for="text">Date de Publication</label>
					    <input  class="form-control" type="date" name="dateJ" min="<?php echo $day?>" placeholder="<?php echo $day?>" required>
					</div>
				    <p>
				    	<button type="submit" class="btn btn-primary">
				    		<span class="glyphicon glyphicon-saved"></span> Enregistrer
				    	</button>
					</p>
				</form>
				<div>
					<br>
					<h4>Liste des journaux</h4>
					<div class="table-responsive">
				        <table class="table table-hover" id="mytable">
				            <thead>
				                <tr>
				                    <th>numero</th>
				                    <th>date de publication</th>
				                    <th>article à la une</th>
				                    <th>publier</th>
				                </tr>
				            </thead>
				            <tbody>
				            	<?php 
				            	$vaovao=$JournalDB->getAllJournal();
				            	foreach($vaovao AS $new) { 
				       			?>
				                <tr>
				                    <td><?php echo $new->idJournal;?></td>
				                    <td><?php echo $base->moisEnLettre($new->dateJournal);?></td>
				                    <td><?php echo $new->idUne;?></td>
				                    <td><?php echo $new->publier;?></td>
				                    <td style="display:flex;">
				                    	
				                       <p>
				                       		<a href="modifierJournal.php?idjournal=<?php echo $new->idJournal;?>" style="text-decoration:none;">
					                       		<button type="submit" class="btn btn-warning">
										    		<span class="glyphicon glyphicon-edit"></span> Modifier
										    	</button>
									    	</a>
									    	<br>
									    	<?php if($new->publier=="non"){?>
				                       		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>?id=<?php echo $new->idJournal;?>" method="POST">
					                       		<input type="text" name="publieOui" style="display:none;" value="oui" />
										    	<button type="submit" class="btn btn-success">
										    		<span class="glyphicon glyphicon-send"></span> Publier
										    	</button>
									    	</form>
									    	<?php }?>
									    	<?php if($new->publier=="oui"){?>
				                       		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>?id=<?php echo $new->idJournal;?>" method="POST">
					                       		<input type="text" name="publieNon" style="display:none;" value="oui" />
										    	<button type="submit" class="btn btn-danger">
										    		<span class="glyphicon glyphicon-remove"></span> Ne plus Publier
										    	</button>
									    	</form>
									    	<?php }?>
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
</script>
