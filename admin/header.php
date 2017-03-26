<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
		<button type="button" id="cli" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      	</button>
			<a class="navbar-brand" href="#" id="logo">Le Journal</a>
		</div>
		<nav role="navigation" id="navigation" class="collapse navbar-collapse">
 			<ul class="nav navbar-nav navbar-right">
		    	<li><a href="#"><strong><?php echo $_SESSION['journal_user']['nomUser'];?> </strong><span class="glyphicon glyphicon-user"></span></a></li>
		      	<li><a href="deconnexion.php"><span class="glyphicon glyphicon-log-out"></span> Déconnexion</a></li>
		    </ul>
		</nav>
			
	</div>
</nav>
<div id="menulateral">
<section id="sidebar">
	<ul>
        <li>
            <a href="index.php"><i class="fa fa-dashboard fa-4x"></i> Création Journal</a>
        </li>
         <li>
            <a href="ajoutArticle.php"><i class="fa fa-newspaper-o fa-4x"></i> Création Article</a>
        </li>
        <li>
            <a href="ajoutCategorie.php"><i class="fa fa-list-alt fa-4x"></i> Les Catégories</a>
        </li>
         <li>
            <a href="archive.php"><i class="fa fa-archive fa-4x"></i> Les Archives</a>
        </li>

    </ul>
</section>
