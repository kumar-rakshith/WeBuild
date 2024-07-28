<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $location = $_POST['location'];
    $message = $_POST['message'];
    $services = implode(', ', $_POST['services']); 
    if (empty($name) || empty($email) || empty($number) || empty($location) || empty($message) || empty($services)) {
        echo "All fields are required.";
    } else {
        $conn = mysqli_connect('localhost', 'root', '', 'db_webuild');
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO submit (name, email, number, location, message, services) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'ssssss', $name, $email, $number, $location, $message, $services);
        if (mysqli_stmt_execute($stmt)) {
            header("Location: contact.html");
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
} else {
    header("Location: contact.html");
    exit();
}
?>
