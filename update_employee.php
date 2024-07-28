<!-- in this page all the upadte operation takes place  -->

<?php
$conn = mysqli_connect('localhost', 'root', '', 'db_webuild');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['update_id'];
    $name = $_POST['update_name'];
    $role = $_POST['update_role'];
    $description = $_POST['update_description'];

    $sql = "UPDATE Employees SET name='$name', role='$role', description='$description' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        header("Location: B.php");
        exit();
    } else {
        echo "Error updating employee information: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

