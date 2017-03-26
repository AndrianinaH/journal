<?php 
    require_once('fonction/Article.class.php');
    require_once('fonction/ArticleDB.class.php');
    require_once('fonction/UtilDb.class.php');
    require_once('fonction/Journal.class.php');
    require_once('fonction/JournalDB.class.php');
    $base=new UtilDb();
    $connect=$base->getConnection();
    $ArticleDB=new ArticleDB($connect);
    $JournalDB=new JournalDB($connect);
    $dateArchive=$JournalDB->getArchiveJournal();
    $arts = $ArticleDB->getArticle($_GET['id']);
?>
<!doctype html>
<html>
	<head>
		<title> <?php echo $arts[0]->titreArticle; ?></title>
	   	<meta charset="UTF-8">
        <meta name="Description" content="<?php echo $arts[0]->titreArticle; ?>"/>
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
                <h2><?php echo $_GET['categorie'];?></h2>
                <?php
                    foreach($arts AS $article) {
                ?>
               <div class="article3">
                    <div id="img_art3">
                            <img src="images/<?php echo $article->nomImage;?>" class="img-thumbnail img_" alt="<?php echo $article->titreArticle;?>" width="224px" height="156px">
                    </div>
                    <div id="comment_art">
                        <h1><?php echo $article->titreArticle;?></h1>
                        <span id="auteur_art">par <?php echo $article->nomAuteur;?></span>
                        <span id="date_art"><?php echo $base->moisEnLettre($article->dateJournal);?></span>
                        <p><?php echo $article->textArticle;?></p>
                
                    </div>
                </div>
                <?php }?>
            </div>
            <div class="droite">
                <h3>Archives</h3>
                <?php  
                    foreach ($dateArchive as $archive) {
                ?>
                <p><a href="archive-<?php echo $archive->dateJournal?>.php"><?php echo $base->moisEnLettre($archive->dateJournal)?></a></p>
                <?php }?>

            </div>
        </div>
        <?php include ('includes/footer.php'); ?>
	</body>
</html>
<script type="text/javascript" src="css/bootstrap/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="css/bootstrap/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    var $img = $('.img_').attr('alt');
    if($img =='')
    {
        $('#img_art3').attr("style","display:none");
    }
});
</script>