<?php
 	require_once('../fonction/User.class.php');
    require_once('../fonction/UserDB.class.php');
    require_once('../fonction/UtilDb.class.php');
    $log = null;
    $pass = null;
    $base=new UtilDb();
	$connect=$base->getConnection();
    $userDB = new UserDB($connect);
    $bool="false";
    $user=null;
    session_start();
    if(isset($_POST['submit']))
	{
		if(isset($_POST['login']) && isset($_POST['pass'])){
	        $log = htmlspecialchars(trim($_POST['login']));
	        $pass = htmlspecialchars(trim($_POST['pass']));
	        if($userDB->testSignUp($log,$pass)) {
	        	$user=$userDB->getUser($log,$pass);
	        	var_dump($user);
	            $_SESSION['journal_user']['idUser'] = $user->idUser;
	            $_SESSION['journal_user']['nomUser'] = $user->nomUser;
	            header('Location:index.php');
	        }
	        else
	        {
	         	$bool="true";
	        }
	    }
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
		<div id="login">
			<h2>Journal</h2>
			<h3>Page Admin</h3>
			<form role="form" action="login.php" method="POST">
				<div class="form-group">
			    	<input type="text" class="form-control" name="login" id="text" placeholder="Identifiant" value="Paul Rakoto" required>
			  	</div>
			  	<div class="form-group">
			    	<input type="password" class="form-control" name="pass" id="pwd" placeholder="Mot de Passe" value="paul"required>
			  	</div>
			  	<button type="submit" class="btn btn-default" name="submit">Se connecter</button>
			</form>

			<input type="text" id="information" style="display:none;" value="<?php echo $bool?>" />
			<div id="myModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title" style='color:#E71919;'><strong>Erreur</strong></h4>
			      </div>
			      <div class="modal-body">
			        <h4>Votre identifiant ou votre mot de passe est incorrect !</h4>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>

			  </div>
			</div>
		</div>
	</body>
</html>
<script type="text/javascript" src="../css/bootstrap/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="../css/bootstrap/js/bootstrap.min.js"></script>

<script>
$(document).ready(function() {

    //afficher Success
    if(document.getElementById("information").value == "true")
    {
        $("#myModal").modal("show");
    }
});
</script>