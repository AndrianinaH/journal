<?php 
  session_start();
  if(!isset($_SESSION['journal_user']))
  {
  	header('Location:login.php');
  }
  	require_once('../fonction/User.class.php');
  	require_once('../fonction/Journal.class.php');
	require_once('../fonction/JournalDB.class.php');
	require_once('../fonction/Article.class.php');
	require_once('../fonction/ArticleDB.class.php');
	require_once('../fonction/UtilDb.class.php');
	$today = new DateTime();
	$day=(string)$today->format('Y-m-d');

	$base=new UtilDb();
	$connect=$base->getConnection();
	$JournalDB=new JournalDB($connect);
	$ArticleDB=new ArticleDB($connect);
	$all=$ArticleDB->getAll();
	$id=0;
	if(isset($_GET["idjournal"]))
	{
		$id=$_GET["idjournal"];
	}
	
	if(isset($_POST["date"])&& isset($_POST["idUne"]))
	{
		$jour=(string)$_POST["date"];
		$JournalDB->updateJournal($_POST["idUne"],$jour,$id);
		header('Location:index.php');

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
			    <li class="title">Modifier Journal</li>
			</ul>
		</section>
		<section class="conteneur">
			<div id="interne">
				<h3>Modifier Journal n°<?php echo $id?></h3>
				
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>?idjournal=<?php echo $id?>" method="POST">
					<div class="form-group" style="width:30%;">
						<div class="form-group">
						    <label for="text">Date de Publication</label>
						</div>
						<div class="form-group">
						    <input class="form-control" type="date" name="date" min="<?php echo $day?>" placeholder="<?php echo $day?>" required>
						</div>
						<div class="form-group">
							<label for="idUne">numero de l'article à la Une</label>
							<select class="form-control" name="idUne" id="idUne" required>
							<?php foreach ($all as $art) {?>
								<option value="<?php echo $art->idArticle;?>">article n° <?php echo $art->idArticle;?></option>
							<?php }?>
							</select>
						</div>
					</div>
				    <p>
				    	<button type="submit" class="btn btn-primary">
				    		<span class="glyphicon glyphicon-saved"></span> Enregistrer
				    	</button>
					</p>
				</form>
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
