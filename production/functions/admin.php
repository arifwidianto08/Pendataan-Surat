<?php 
// Connection
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'pendataan_surat';
$conn = mysqli_connect($hostname,$username,$password,$database);



function add_admin($creds){
    // global $conn;

    // $name = $creds['name'];
    // $email = $creds['email'];
    // $position = $creds['position'];
    // $address = $creds['address'];
    // $password = $creds['password'];
    // $encrypted_password = password_hash($password, PASSWORD_DEFAULT);

    // $query = "INSERT INTO admin VALUES('','$username', '$name','$email', '$position', '$address', '$encrypted_password')";

	// $username_checker = mysqli_query($conn, "SELECT username FROM admin WHERE username = '$username'");
	// if(mysqli_fetch_assoc($username_checker)){
	// 	echo "<script>
	// 		alert('username sudah terdaftar')
	// 	</script>";
	// 	return false;
	// }


    // mysqli_query($conn, $query);

    // return mysqli_affected_rows($conn);
    echo "<script>alert('yeay')</script>";
};

// function


?>