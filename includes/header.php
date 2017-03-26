<?php
	require_once('fonction/Categorie.class.php');
	require_once('fonction/CategorieDB.class.php');
	require_once('fonction/Article.class.php');
    require_once('fonction/ArticleDB.class.php');
    require_once('fonction/Journal.class.php');
    require_once('fonction/JournalDB.class.php');
	require_once('fonction/UtilDb.class.php');
	$base=new UtilDb();
	$connect=$base->getConnection();
	$CategorieDB=new CategorieDB($connect);
	$tabCategorie=$CategorieDB->getAllCategorie();
	$ArticleDB=new ArticleDB($connect);
	$JournalDB=new JournalDB($connect);
    if(isset($_GET['date']))
    {
        $lastDate=$_GET['date'];
    }
    else
    {
        $lastDate=$JournalDB->getLastDate();
    }
    $laUne=$ArticleDB->getLaUne($lastDate);
?>
<header>
	<div id="top-bg"></div>
	<div class="container">
		<div id="logo"><img src="images/header_footer/logoSite.jpg" class="img-thumbnail" alt="logoJ"></div>
		<nav class="navbar navbar-default" data-spy="affix" data-offset-top="200">
			<div class="container">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-controls="navbar">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      	</button>
				<ul class="nav navbar-nav collapse navbar-collapse" id="navigation">
					<li><a href="accueil.php">Accueil</a></li>
					 <?php foreach($laUne AS $une) { ?>
					<li><a href="article-<?php echo $une->idArticle;?>-<?php echo $une->nomCategorie; ?>.php">La Une</a></li>
					<?php }?>
					<?php foreach($tabCategorie AS $categorie) { ?>
					<li><a href="categorie-<?php echo $categorie->idCategorie;?>-<?php echo $categorie->nomCategorie;?>.php"><?php echo $categorie->nomCategorie;?></a></li>
					<?php } ?>
				</ul>
			</div>
		</nav>
	</div>
</header>