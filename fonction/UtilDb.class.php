<?php 

class UtilDb{

	public function getConnection() {
		$user='root';
        $pass='root';
        $dsn='mysql:host=localhost;dbname=journal;charset=utf8';
		try {
			$connect = new PDO($dsn, $user, $pass);
			$connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			//$connect->exec('SET CHARACTER SET utf8');
		} catch(PDOException $e) {
			throw $e;
		}
		return $connect;
	}

	public function moisEnLettre($date)
	{
		$dat = explode("-", $date);
		$mois=$dat[1];
		switch ($mois) {
    		case 1:
		       $dd=$dat[2].' '.'janvier'.' '.$dat[0] ;
		        break;
	        case 2:
		        $dd=$dat[2].' '.'février'.' '.$dat[0] ;
		        break;
		    case 3:
		       $dd=$dat[2].' '.'mars'.' '.$dat[0] ;
		        break;
	        case 4:
		        $dd=$dat[2].' '.'avril'.' '.$dat[0] ;
		        break;
	        case 5:
		        $dd=$dat[2].' '.'mai'.' '.$dat[0] ;
		        break;
	        case 6:
		       $dd=$dat[2].' '.'juin'.' '.$dat[0] ;
		        break;
	        case 7:
		       $dd=$dat[2].' '.'juillet'.' '.$dat[0] ;
		        break;
	        case 8:
		       $dd=$dat[2].' '.'août'.' '.$dat[0] ;
		        break;
	        case 9:
		       $dd=$dat[2].' '.'septembre'.' '.$dat[0] ;
		        break;
		    case 10:
		        $dd=$dat[2].' '.'octobre'.' '.$dat[0] ;
		        break;
		    case 11:
		       $dd=$dat[2].' '.'novembre'.' '.$dat[0] ;
		        break;
	        case 12:
		       $dd=$dat[2].' '.'decembre'.' '.$dat[0] ;
		        break;
    	}
    	return $dd;

	}

	

}


?>