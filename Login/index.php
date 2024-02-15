<?php
// validasi error
error_reporting(E_ALL);
ini_set('display_errors', 1);

// SIGNUP
if(isset($_POST['submit-su'])) {
    $fname_su = $_POST['fname-su'];
    $email_su = $_POST['email-su'];
    $pw_su = $_POST['pw-su'];

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
    $sql_signup = "INSERT INTO data_signup (fullname, email, password) VALUES ('$fname_su', '$email_su', '$pw_su')";

    // validasi jika data berhasil masuk ke sql
    $rs_signup = mysqli_query($con, $sql_signup);
    if($rs_signup) {
        echo "Data signup telah terinput";
    } else {
        echo "Gagal memasukkan data signup: " . mysqli_error($con);
    }

    // close connection
    mysqli_close($con);
}

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

    // validasi jika data berhasil masuk ke sql
    $rs_login = mysqli_query($con, $sql_login);
    if($rs_login) {
        echo "Data login telah terinput";
    } else {
        echo "Gagal memasukkan data login: " . mysqli_error($con);
    }

    // close connection
    mysqli_close($con);
}
?>
