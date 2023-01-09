<?php 
session_start(); 
include "connect.php";

if ( isset($_POST["signup"])){

    $username = $_POST['username'];
	$password = $_POST['password'];
    $name = $_POST['name'];
    $position = $_POST['position'];

    if($position === '--Position--'){
        echo "<script>
                alert('Position is required');
                document.location.href = 'index.html';
                </script>";	
                exit();
            }
    else{

        $sql = "SELECT * FROM user_accounts WHERE username='$username'";
	    $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 0) {
            mysqli_query($conn, "INSERT INTO user_accounts VALUES('', '$name', '$position', '$username', '$password')");
                echo "<script>
                alert('Sign Up Succeed!');
                document.location.href = 'index.html';
                </script>";
            }
            
        

        else {
            echo "<script>
            alert('Username is taken');
            document.location.href = 'index.html';
            </script>";
            }
        }
    }

else {
    echo "<script>
    alert('Sign Up Error');
    document.location.href = 'index.html';
    </script>";
}