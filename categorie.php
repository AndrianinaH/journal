<?php 
    require_once('fonction/Article.class.php');
    require_once('fonction/ArticleDB.class.php');
    require_once('fonction/Categorie.class.php');
    require_once('fonction/CategorieDB.class.php');
    require_once('fonction/Journal.class.php');
    require_once('fonction/JournalDB.class.php');
    require_once('fonction/UtilDb.class.php');
    $base=new UtilDb();
    $connect=$base->getConnection();
    $CategorieDB=new CategorieDB($connect);
    $ArticleDB=new ArticleDB($connect);
    $JournalDB=new JournalDB($connect);
    $cats=$CategorieDB->getCategorie($_GET['id']);
    $dateArchive=$JournalDB->getArchiveJournal();
    if(isset($_GET['date']))
    {
        $lastDate=$_GET['date'];
    }
    else
    {
        $lastDate=$JournalDB->getLastDate();
    }
?>
<!doctype html>
<html>
	<head>
		<title><?php echo $cats[0]->nomCategorie;?> - Toute l'actualité de Madagascar sur Le Journal</title>
	   	<meta charset="UTF-8">
        <meta name="Description" content="Rubrique <?php echo $cats[0]->nomCategorie;?> sur Le Journal"/>
		<link rel="stylesheet"  style="text/css" href="css/style.min.css">
		<link rel="stylesheet"  style="text/css" href="css/header_footer.min.css">
		<link rel="stylesheet"  style="text/css" href="css/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet"  style="text/css" href="css/bootstrap/css/font-awesome.min.css">
		<link rel="icon" type="image/png" href="images/header_footer/logoJournal.png" />
		<meta name="viewport" content="width=device-width">	
	</head>
	<body>	
        <?php include ('includes/header.php'); ?>
        <div  id="mid-line"></div>
        <div class="container main_content">
            <div class="gauche">
                <?php foreach($cats AS $cat) { ?>
                <h2><?php echo $cat->nomCategorie;?></h2>
                <?php
                    $arts = $ArticleDB->getAllArticle($cat->nomCategorie,$lastDate);
                }?>
                <?php if(empty($arts)){?>
                    <h5>Oups, c'est embarassant, il semble qu'il n'y a pas d'article de cette catégorie ce <strong><?php echo $base->moisEnLettre($lastDate);?><strong></h5>

                <?php }if(!empty($arts)){
                    foreach($arts AS $art) {
                ?>
                <div class="article">
                    <div id="img_art">
                    <?php if($art->nomImage!=''){ ?>
                         <a href="article-<?php echo $art->idArticle;?>-<?php echo $art->nomCategorie; ?>.php"> 
                            <img src="images/<?php echo $art->nomImage;?>" class="img-thumbnail" alt="<?php echo $art->titreArticle;?>" width="224px" height="156px">
                        </a>
                    <?php } ?>
                    </div>
                    <div id="comment_art">
                        <h1><a href="article-<?php echo $art->idArticle;?>-<?php echo $art->nomCategorie; ?>.php"><?php echo $art->titreArticle;?></a></h1>
                        <span id="auteur_art">par <?php echo $art->nomAuteur;?></span>
                        <span id="date_art"><?php echo $base->moisEnLettre($art->dateJournal);?></span>
                        <p>
                            <?php echo $ArticleDB->getExtrait($art->textArticle,400);?>
                        </p>
                        <a href="article-<?php echo $art->idArticle;?>-<?php echo $art->nomCategorie; ?>.php">
                            <button type="button" class="btn btn-default btn-sm"><strong>Lire la suite...</strong></button>
                        </a>
                    </div>
                </div>
                <?php }}?>
            </div>
            <div class="droite">
                <h3>Archives</h3>
                <?php  
                    foreach ($dateArchive as $archive) {
                ?>
                <p><a href="categorie-<?php echo $cat->idCategorie?>.<?php echo $archive->dateJournal?>.php"><?php echo $base->moisEnLettre($archive->dateJournal)?></a></p>
                <?php }?>

            </div>
        </div>
        <?php include ('includes/footer.php'); ?>
	</body>
</html>
<script type="text/javascript" src="css/bootstrap/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="css/bootstrap/js/bootstrap.min.js"></script>
