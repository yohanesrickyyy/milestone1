<?php
// errror checking
error_reporting(E_ALL);
ini_set('display_errors', 1);

//! SIGNUP
if(isset($_POST['submit-su'])) {
    $fname_su = $_POST['fname-su'];
    $email_su = $_POST['email-su'];
    $pw_su = $_POST['pw-su'];

    // Hashing password
    $hashed_pw_su = password_hash($pw_su, PASSWORD_DEFAULT);

    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "milestone";

    // membuat koneksi
    $con = mysqli_connect($host, $username, $password, $dbname);

    // validasi berhasil atau tidak
    if(!$con) {
        die("koneksi gagal!" . mysqli_connect_error());
    }

    // memasukan data ke sql (signup)
    $sql_signup = "INSERT INTO data_signup (fullname, email, password) VALUES (?, ?, ?)";

    // Prepared statement
    $stmt_signup = mysqli_prepare($con, $sql_signup);
    mysqli_stmt_bind_param($stmt_signup, "sss", $fname_su, $email_su, $hashed_pw_su);
    mysqli_stmt_execute($stmt_signup);

    // validasi jika data berhasil masuk ke sql
    if(mysqli_stmt_affected_rows($stmt_signup) > 0) {
        echo "Data signup telah terinput";
    } else {
        echo "Gagal memasukkan data signup: " . mysqli_error($con);
    }

    // close statement
    mysqli_stmt_close($stmt_signup);
    // close connection
    mysqli_close($con);
}

//! LOGIN FORM
if(isset($_POST['submit-lo'])) {
    $email_lo = $_POST['email-lo'];
    $pw_lo = $_POST['pw-lo'];

    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "milestone";

    // membuat koneksi
    $con = mysqli_connect($host, $username, $password, $dbname);

    // validasi berhasil atau tidak
    if(!$con) {
        die("koneksi gagal!" . mysqli_connect_error());
    }

    // memasukan data ke sql (login)
  $sql_login = "INSERT INTO data_login (email, password) VALUES ('$email_lo', '$pw_lo')";


    // Prepared statement
    $stmt_login = mysqli_prepare($con, $sql_login);
    mysqli_stmt_bind_param($stmt_login, "ss", $email_lo, $pw_lo);
    mysqli_stmt_execute($stmt_login);

    // validasi jika data berhasil masuk ke sql
    if(mysqli_stmt_affected_rows($stmt_login) > 0) {
        echo "Data login telah terinput";
    } else {
        echo "Gagal memasukkan data login: " . mysqli_error($con);
    }

    // close statement
    mysqli_stmt_close($stmt_login);
    // close connection
    mysqli_close($con);
}
?>
