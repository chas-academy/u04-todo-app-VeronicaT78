<?php

session_start();

$errors = "";


$servername = "localhost";
$username = "root";
$password = "example";

try {
  $conn = new PDO("mysql:host=$servername;dbname=todoapp", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}


// $sql = mysqli_connect('db', 'root', 'example', 'todoapp');

// 	// initialize variables
	$task = "";
	$type = "";
 	$id = 0;
 	//$update = false;

 	if (isset($_POST['submit'])) {
 		$task = $_POST['task'];
 		$type = $_POST['type'];

 		mysqli_query($conn, "INSERT INTO tasks (task, type) VALUES ('$task', '$type')"); 
		$_SESSION['message'] = "Task saved"; 
 		header('location: index.php');
 	}


// $db = mysqli_connect("localhost", "root", "example", "todoapp");

// if(isset($_POST['submit'])){
//         $task = $_POST['task'];
//         $type = $_POST['type'];
//         $sql = "INSERT INTO tasks (task, type) VALUES ('$task', '$type')";
//         mysqli_query($db, $sql);
        
//         if($query_run)
//             {
//                 $_SESSION['status'] = "Inserted Succesfully";
//                 header("Location: index.php");
//             }
//         else
//             {
//                 $_SESSION['status'] = "Not Inserted";
//                 header("Location: index.php");
//             }
//     }

// $serverName="localhost";
// $dBUsername="root";
// $dBPassword="";
// $dBName="";

// $conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

// if (!$conn){
//     die("Connection failed: " . mysqli_connect_error());

// }


//  function connectDB(){

//  $host = 'localhost';
//  $db = 'todoapp';
//  $user = 'root';
//  $pass = 'example';
//  $charset = 'utf8';

// $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
// $options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
//  $options = [
//      PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
//      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//      PDO::ATTR_EMULATE_PREPARES   => false,];

// try {
//  $pdo = new PDO($dsn, $user, $pass, $options);
//  return $pdo;
//     } catch(PDOException $e){
//     throw new PDOException($e->getMessage(), $e->getCode());
//  }
//  var_dump($pdo);
//  exit();
// }



?>