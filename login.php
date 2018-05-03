<?php
	/*session_start();
	mysql_connect("localhost","root","1234");
    mysql_select_db("customer");
    echo $_POST['txtUsername'];
    echo $_POST['txtPassword'];
	$strSQL = "SELECT * FROM customers WHERE Customer_ID = '".mysql_real_escape_string($_POST['txtUsername'])."' 
    and Password = '".mysql_real_escape_string($_POST['txtPassword'])."'";
    echo "<br>".$strSQL;
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	if(!$objResult)
	{
			echo "Username and Password Incorrect!";
	}
	else
	{
			$_SESSION["Name"] = $objResult["Name"];
			$_SESSION["Income"] = $objResult["Income"];
        echo "eee";
			session_write_close();
			
			// if($objResult["Status"] == "ADMIN")
			// {
			// 	header("location:admin_page.php");
			// }
			// else
			// {
			// 	header("location:user_page.php");
			// }
	}
    mysql_close();*/
    
  define('DB_SERVER', 'localhost');
  define('DB_USERNAME', 'root');
  define('DB_PASSWORD', '1234');
  define('DB_DATABASE', 'customer');
  $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
  session_start();
  $error = "";
    //echo $_SERVER["REQUEST_METHOD"];
  if($_SERVER["REQUEST_METHOD"] == "POST") {
  $myusername=$_POST['txtUsername'];
  $mypassword=$_POST['txtPassword'];
  $sql = "SELECT * FROM customers WHERE Customer_ID = '$myusername' and Password = '$mypassword'";
  $result = mysqli_query( $db,$sql );

  if( $result ){
    while( $row = mysqli_fetch_assoc( $result ) ){
    $_SESSION['login_user'] = $myusername;
    echo "SUCCESS".$myusername;
    echo $row['Customer_ID']." ".$row['Password']."<br>";
    }
  }
  else{
  $error = "Your Login Name or Password is invalid";
  }
  }
?>