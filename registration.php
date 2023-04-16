<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'elitmus';

$con = mysqli_connect($DATABASE_HOST,$DATABASE_USER,$DATABASE_PASS,$DATABASE_NAME);

if(mysqli_connect_error())
{
    exit('Error connecting to the database'.mysqli_connect_error());
}

if(!isset($_POST['fname'],$_POST['lname'],$_POST['uname'],$_POST['pass'],$_POST['email'],$_POST['mno'])){
    exit('Empty Field(s)');
}

if(empty($_POST['fname']) || empty($_POST['lname']) || empty($_POST['uname']) || empty($_POST['pass']) || empty($_POST['email']) || empty($_POST['mno'])){
    exit('Values Empty');
}


        if($sql = $con->prepare('INSERT INTO register(FirstName,LastName,Username,Password,Email,Mobile) VALUES (?,?,?,?,?,?)'))
        {
            $password=password_hash($_POST['pass'],PASSWORD_DEFAULT);
            $sql->bind_param('ssssss',$_POST['fname'],$_POST['lname'],$_POST['uname'],$_POST['pass'],$_POST['email'],$_POST['mno']);
            $sql->execute();
            header('Location:hangman.html');
        }
        else
        {
            echo 'Error Occurred';
        }
    
    $sql->close();

$con->close();

?>