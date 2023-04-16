<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $uname = $_POST["user"];
        $psd=$_POST["pass"];
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'elitmus';

        $conn = mysqli_connect($host, $username, $password, $dbname);

        if ($conn) {
            echo "Connection successful.";
        }
        else{
            echo "Connection Failed.";
            die("Connection Failed:".mysqli_connect_error());
        }
        $sql = "select * from register where Username= '$uname' and Password='$psd'";
        $res = mysqli_query($conn,$sql);
        if(mysqli_num_rows($res)>0 ){
           header('Location:hangman.html');
        }
        else{
            $_SESSION["errorMessage"] = "Invalid Credentials";
            header('Location:login.html');
        }
}
?>