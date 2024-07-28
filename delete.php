<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    $id = $_POST['id'];
    $conn = mysqli_connect('localhost', 'root', '', 'db_webuild');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "DELETE FROM Submit WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, 'i', $id);
    if (mysqli_stmt_execute($stmt)) {
        header("Location: C.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: C.php");
    exit();
}
?>

<!-- this file is used to delete the submit record  -->
