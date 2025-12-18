<?php
session_start(); 
if (isset($_GET["new_id"])) {
    $id = $_GET["new_id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "businesses";

    // crate connection
    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM businesses WHERE new_id=$id";
    $query_run = $connection->query($sql);

    if ($query_run) {
        $_SESSION['status_2'] = 'BUSINESS REMOVED SUCCESSFULLY!';
    } else {
        echo 'Something went wrong.';
    }
}
 header("Location: admin_page.php");
    exit();
?>