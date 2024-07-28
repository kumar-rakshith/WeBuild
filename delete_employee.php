<?php
$conn = mysqli_connect('localhost', 'root', '', 'db_webuild');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_POST['delete_id'])) {
    $employeeId = $_POST['delete_id'];
    $sql = "DELETE FROM employees WHERE id = $employeeId";
    if (mysqli_query($conn, $sql)) {
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}
mysqli_close($conn);
?>

<!-- this file is user  to delete the employee record -->