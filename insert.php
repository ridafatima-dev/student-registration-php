<?php
require_once "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name   = $_POST['name'];
    $email  = $_POST['email'];
    $phone  = $_POST['phone'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : "";
    $dept   = $_POST['department'];

    $sql = "INSERT INTO students (name, email, phone, gender, department)
            VALUES ('$name', '$email', '$phone', '$gender', '$dept')";

    if (mysqli_query($conn, $sql)) {
        echo "Record inserted successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>