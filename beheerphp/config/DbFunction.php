
<?php
require('Database.php');

class DbFunction{
	
	function login($loginid,$password){
	
      if(!ctype_alpha($loginid) || !ctype_alpha($password)){
      	
        echo "<script>alert('Foute Inlog Gegevens')</script>";
      
	  }		
	  
   else{		
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "SELECT loginid, password FROM admin_tbl where loginid=? and password=? ";
	$stmt= $mysqli->prepare($query);
	if(false===$stmt){
		
		trigger_error("Error in query: " . mysqli_connect_error(),E_USER_ERROR);
	}
	
	else{
		
		$stmt->bind_param('ss',$loginid,$password);
		$stmt->execute();
		$stmt -> bind_result($loginid,$password);
		$rs=$stmt->fetch();
		if(!$rs)
		{
			echo "<script>alert('Ongeldige Details')</script>";
			header('location:login.php');
		}
		else{
			
			header('location:view-gebruiker.php');
		}
	}
	
	}
	
	}

	// Function voor het aanmaken van een gebruiker + encryption password
	function create_user($cusername,$cfirstname,$clastname,$cemail,$cphonenumber,$cadress,$cpassword,$crole,$cdate){

			$cpassword = md5($cpassword);
			$db = Database::getInstance();
			$mysqli = $db->getConnection();
			$query = "insert into gebruikers(cusername,cfirstname,clastname,cemail,cphonenumber,cadress,cpassword,crole,cdate)values(?,?,?,?,?,?,?,?,?)";
			$stmt= $mysqli->prepare($query);

		if(false===$stmt) {
			
			trigger_error("Error in query: " . mysqli_connect_error(),E_USER_ERROR);
		}
			
		else {
			
			$stmt->bind_param('sssssssss',$cusername,$cfirstname,$clastname,$cemail,$cphonenumber,$cadress,$cpassword,$crole,$cdate);
			$stmt->execute();
			echo "<script>alert('Gebruiker Succesvol Toegevoegd')</script>";
			header('location:view-gebruiker.php');
				
			}			
		}

	// Function voor het updaten van een gebruiker + encryption password
	function update_gebruiker($cusername,$cfirstname,$clastname,$cemail,$cphonenumber,$cadress,$cpassword,$crole,$cdate,$id){
		
			$cpassword = md5($cpassword);
			$db = Database::getInstance();
			$mysqli = $db->getConnection();
			$query = "update gebruikers set cusername=?,cfirstname=?,clastname=?,cemail=?,cphonenumber=?,cadress=?,cpassword=?,crole=?,cdate=? where cid=?";
			$stmt= $mysqli->prepare($query);

		if(false===$stmt) {
		
			trigger_error("Error in query: " . mysqli_connect_error(),E_USER_ERROR);
		}
		
		else{
		
			$stmt->bind_param('sssssssssi',$cusername,$cfirstname,$clastname,$cemail,$cphonenumber,$cadress,$cpassword,$crole,$cdate,$id);
			$stmt->execute();
			echo "<script>alert('Gebruiker Succesvol Aangepast')</script>";
				header('location:view-gebruiker.php');
			
			}			
		}

function showUser() {
	
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "SELECT * FROM `gebruikers`";
	$stmt= $mysqli->query($query);
	return $stmt;	
}

function showUser2($id) {
	
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "SELECT * FROM `gebruikers` where cid='".$id."'";
	$stmt= $mysqli->query($query);
	return $stmt;
	
}

function showOrders() {
	
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "SELECT * FROM `orders`";
	$stmt= $mysqli->query($query);
	return $stmt;	

	while($row = mysqli_fetch_assoc($stmt))
    {
        foreach(json_decode($row['tickets']) as $ticket){
            array_push($finalArray, $ticket);
        }
 
    }
    return $finalArray;
}

function showSession(){
	
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "SELECT * FROM session  ";
	$stmt= $mysqli->query($query);
	return $stmt;
	
}

function del_user($id){

    $db = Database::getInstance();
    $mysqli = $db->getConnection();
    $query="delete from gebruikers where cid=?";
    $stmt= $mysqli->prepare($query);
    $stmt->bind_param('s',$id);
	$stmt->execute();
    echo "<script>alert('Gebruiker is verwijderd')</script>";
    echo "<script>window.location.href='view-gebruiker.php'</script>";
}

 function del_order($id){

    $db = Database::getInstance();
    $mysqli = $db->getConnection();
    $query="delete from orders where orderID=?";
    $stmt= $mysqli->prepare($query);
    $stmt->bind_param('i',$id);
	$stmt->execute();
    echo "<script>alert('Bestelling is verwijderd')</script>";
    echo "<script>window.location.href='view-orders.php'</script>";
}

}

?>



