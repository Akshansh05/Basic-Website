<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";
$comm="";
$selected1="";
$visa=0;
$passport=0;
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
 if(isset($_POST['submit'])) 
  {        session_start(); 
$comm=$_POST["comment"];
$selected1=$_POST["country"];   
   if(!empty($_POST['check_list'])){
       foreach($_POST['check_list'] as $selected){
           if($selected == 'Visa')
                { $visa=1;
                 
                }
           else{
               $passport=1;
           }

           
       }
       
   }
$sql = "INSERT INTO form (comment, visa, passport,country)
VALUES ('$comm',$visa ,$passport ,'$selected1')";  
  }
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}