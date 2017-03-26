<?php 
    require_once('fonction/Article.class.php');
    require_once('fonction/ArticleDB.class.php');
    require_once('fonction/Journal.class.php');
    require_once('fonction/JournalDB.class.php');
    require_once('fonction/UtilDb.class.php');
    $base=new UtilDb();
    $connect=$base->getConnection();
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
    $dateArchive=$JournalDB->getArchiveJournal();

?>
<!doctype html>
<html>
	<head>
	
		<title>Le Journal - Actualité et Infos à Madagascar</title>
	   	<meta charset="UTF-8">
        <meta name="Description" content="Le Journal - Actualité et Infos à Madagascar"/>
		<link rel="stylesheet"  style="text/css" href="css/style.min.css">
		<link rel="stylesheet"  style="text/css" href="css/header_footer.min.css">
		<link rel="stylesheet"  style="text/css" href="css/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet"  style="text/css" href="css/bootstrap/css/font-awesome.min.css">
		<link rel="icon" type="image/png" href="images/header_footer/logoJournal.png" />
		<meta name="viewport" content="width=device-width">	
	</head>
	<body data-spy="scroll" data-target=".navbar" data-offset="200">	
        <?php include ('includes/header.php'); ?>
        <div  id="mid-line"></div>
        <div class="container main_content">
            <div class="gauche">
                <h1>A la Une</h1> 

                <?php foreach($laUne AS $une) { ?>

                <div class="article">
                    <div id="img_art">
                        <a href="article-<?php echo $une->idArticle;?>-<?php echo $une->nomCategorie; ?>.php"> 
                            <img src="images/<?php echo $une->nomImage;?>" class="img-thumbnail img_" alt="<?php echo $une->titreArticle;?>" width="304px" height="236px">
                        </a>
                    </div>
                    <div id="comment_art">
                        <h2 id="cat_une"><?php echo $une->nomCategorie;?></h2>
                        <h1><a href="article-<?php echo $une->idArticle;?>-<?php echo $une->nomCategorie; ?>.php"><?php echo $une->titreArticle;?></a></h1>
                        <span id="auteur_art"><?php echo $une->nomAuteur;?></span>
                        <span id="date_art"><?php echo $base->moisEnLettre($une->dateJournal);?></span>
                        <p><?php echo $ArticleDB->getExtrait($une->textArticle,400);?></p>
                        <a href="article-<?php echo $une->idArticle;?>-<?php echo $une->nomCategorie; ?>.php">
                            <button type="button" class="btn btn-default btn-sm"><strong>Lire la suite...</strong></button>
                        </a>
                    </div>
                </div>
                <?php }?>
                <div class="article2">
                    <?php $cat = $ArticleDB->getCategorieActif($lastDate);
                            foreach($cat as $categorie){
                    ?>
                    <div id="categorie_art">
                        <h2><?php echo $categorie?></h2>
                    
                        <?php 
                        $articles = $ArticleDB->getAllArticle($categorie,$lastDate);
                        if(empty($articles)){
                        ?>
                        <h5>Oups, c'est embarassant, il semble qu'il n'y a pas d'article de cette catégorie ce <strong><?php echo $base->moisEnLettre($lastDate);?><strong></h5>

                        <?php }if(!empty($articles)){
                            foreach ($articles as $article) {
                            ?>
                        <div id="block_art">
                            <div id="ptit_block">
                                <div id="img_art2">
                                <?php if($article->nomImage!=''){ ?>
                                    <a href="article-<?php echo $article->idArticle;?>-<?php echo $article->nomCategorie; ?>.php"> 
                                       <img src="images/<?php echo $article->nomImage;?>" class="img-thumbnail" alt="<?php echo $article->titreArticle;?>" width="224px" height="156px">
                                    </a>
                                <?php } ?>
                                </div>
                                <div id="comment_art2">
                                    <h4><a href="article-<?php echo $article->idArticle;?>-<?php echo $article->nomCategorie; ?>.php"><?php echo $article->titreArticle;?></a></h4>
                                    <span id="date_art"><?php echo $base->moisEnLettre($article->dateJournal);?></span>
                                    <?php echo $ArticleDB->getExtrait($article->textArticle,100);?>   
                                </div>
                            </div>
                            <a href="article-<?php echo $article->idArticle;?>-<?php echo $article->nomCategorie; ?>.php">
                                <button type="button" class="btn btn-default btn-sm"><strong>Lire la suite...</strong></button>
                            </a>
                        </div>
                        <?php }} ?>
                    </div>
                    <?php }?>
                    
                </div>
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
        $('#img_art').attr("style","display:none");
    }
});
</script>