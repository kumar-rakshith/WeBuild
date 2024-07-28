<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Details</title>
    <style>
        .tt {
            text-align: center;
            font-size: 30px;
            font-family: 'Times New Roman', Times, serif;
            margin: 25px 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            border: none;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
            border: none;
        }

        th {
            background-color: #fff;
            font-family: 'Times New Roman', Times, serif;

        }

        tr {
            border: 3px solid black;
        }

        img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
        }

        .btn {
            padding: 5px 10px;
            background-color: #f5bf23;
            color: #fff;
            border: none;
            cursor: pointer;
            width: 90px;
            margin-top: 8px;
            border-radius: 10px;
        }

        .btn:hover {
            background-color: #a17a03;
        }

        .pagination {
            text-align: center;
            margin-top: 10px;
        }

        .pagination a:hover {
            background-color: #a17a03;
        }

        .pagination a {
            display: inline-block;
            margin: 0 5px;
            padding: 5px 10px;
            background-color: #f5bf23;
            color: #fff;
            text-decoration: none;
            border-radius: 10px;
            width: 90px;
        }

        .del {
            background-color: #dc3545;
        }

        .del:hover {
            background-color: #c82333;
        }

        /*  undu onji css file d padla */
    </style>
</head>

<body>

    <h1 class="tt">Employee Details</h1>

    <?php
    // Database name change manpu
    $conn = mysqli_connect('localhost', 'root', '', 'db_webuild');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $limit = 3;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $start = ($page - 1) * $limit;
    $sql = "SELECT * FROM Employees LIMIT $start, $limit";
    $result = mysqli_query($conn, $sql);

    echo "<table>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td><img src='" . $row['image'] . "' alt='" . $row['name'] . "'></td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['role'] . "</td>";
        echo "<td>" . $row['description'] . "</td>";
        echo "<td>";
        echo "<button class='btn' onclick='updateEmployee()'>Update</button>";
        echo "<form method='post' action='delete_employee.php'>";
        echo "<input type='hidden' name='delete_id' value='" . $row["id"] . "'>";
        echo "<button type='submit' class='btn del' onclick='return confirm(\"Are you sure you want to delete this employee?\")'>Delete</button>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
    $sql_total = "SELECT COUNT(*) AS total FROM Employees";
    $result_total = mysqli_query($conn, $sql_total);
    $row_total = mysqli_fetch_assoc($result_total);
    $total_records = $row_total['total'];
    $total_pages = ceil($total_records / $limit);

    echo "<div class='pagination'>";
    for ($i = 1; $i <= $total_pages; $i++) {
        echo "<a href='?page=$i'>$i</a>";
    }
    echo "</div>";

    mysqli_close($conn);
    ?>

    <script>
        function deleteEmployee(employeeId) {
            if (confirm("Are you sure you want to delete this employee?")) {
                window.location.href = "delete_employee.php?id=" + employeeId;
            }
        }

        function updateEmployee() {
        }
    </script>

</body>

</html>