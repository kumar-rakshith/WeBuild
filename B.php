<!-- Employee sction of admin -->



<?php
session_start();
// to kill session
if (!isset($_SESSION['username'])) {
    header("Location: admin.php");
    exit();
}
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: admin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="Dashboard.css" />
    <!-- Font Awesome Cdn Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-..(hash)..">
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

        .uu {
            padding: 0 20px;

        }

        .form-input {
            margin-bottom: 10px;
            padding: 8px;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btn-update {
            padding: 8px 16px;
            background-color: #f5bf23;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-update:hover {
            background-color: #a17a03;
        }


        #logout_text {
            font-weight: 600;
        }

        #logout_container:hover {
            color: #c82333;
            font-weight: 600;
        }

        #logout_container {
            margin-top: 400px;
        }


        /*  undu onji css file d padla */
    </style>
</head>

<body>
    <div class="container">
        <aside>
            <ul>
                <li><a href="#" class="logo">
                        <img src="image/Wbuild.png" alt="">
                        <span class="aside-item"><span class="special-span">We</span>Build</span>
                    </a></li>


                <li><a href="A.php" class="aside-link">
                        <i class="fas fa-home"></i>
                        <span class="aside-item">Home</span>
                    </a></li>


                <li><a href="#" class="aside-link" data-target="emp">
                        <i class="fas fa-user"></i>
                        <span class="aside-item">Employee</span>
                    </a></li>

                <li><a href="C.php" class="aside-link">
                        <i class="fas fa-user"></i>
                        <span class="aside-item">Booking</span>
                    </a></li>

                <li><a href="admin.php" class="aside-link" data-target="emp" id="logout_container" onclick="return confirmLogout()">
                        <i class="fas fa-sharp fa-solid fa-right-from-bracket"></i>
                        <span class=" aside-item" id="logout_text">Logout</span>
                    </a></li>

            </ul>
        </aside>
        <section class="main">
            <nav style="height: 70px; background-color:#fff; width: 100%; padding-left:30px; padding: 20px;">
                <h1>Employee Section</h1>
            </nav>
            <section id="emp" class="main-content uu">
                <h1 class="tt">Employee Details</h1>
                <?php
                // Database connection
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

                echo "<thead>";
                echo "<tr>";
                echo "<th>Image</th>";
                echo "<th>Name</th>";
                echo "<th>Role</th>";
                echo "<th>Description</th>";
                echo "<th>Actions</th>";
                echo "</tr>";
                echo "</thead>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td><img src='" . $row['image'] . "' alt='" . $row['name'] . "'></td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['role'] . "</td>";
                    echo "<td>" . $row['description'] . "</td>";
                    echo "<td>";
                    echo "<button class='btn' onclick='updateEmployee(" . $row['id'] . ", \"" . $row['name'] . "\", \"" . $row['role'] . "\", \"" . $row['description'] . "\")'>Update</button>";
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
            </section>
            <form id="updateForm" method="post" action="update_employee.php" style="display: none;">
                <input type="hidden" id="update_id" name="update_id" value="">
                <input type="text" id="update_name" name="update_name" placeholder="Name" class="form-input">
                <input type="text" id="update_role" name="update_role" placeholder="Role" class="form-input">
                <input type="text" id="update_description" name="update_description" placeholder="Description" class="form-input">
                <button type="submit" class="btn btn-update">Update</button>
            </form>

        </section>
    </div>
    <script>
        function updateEmployee(id, name, role, description) {
            // Redirect to the update page with the necessary parameters
            window.location.href = 'update_employee_page.php?id=' + id + '&name=' + encodeURIComponent(name) + '&role=' + encodeURIComponent(role) + '&description=' + encodeURIComponent(description);
        }

        document.addEventListener('DOMContentLoaded', function() {
            const navLinks = document.querySelectorAll('.aside-link');
            const mainContents = document.querySelectorAll('.main-content');
            const homeSection = document.getElementById('emp');

            // Activate the home section by default
            homeSection.classList.add('active');

            navLinks.forEach(function(navLink) {
                navLink.addEventListener('click', function() {
                    const targetId = navLink.getAttribute('data-target');
                    mainContents.forEach(function(content) {
                        if (content.id === targetId) {
                            content.classList.add('active');
                            // Hide the update form when switching to the "Employee" section
                            if (targetId === 'emp') {
                                document.getElementById('updateForm').style.display = 'none';
                            }
                        } else {
                            content.classList.remove('active');
                        }
                    });
                });
            });



            document.getElementById('updateForm').addEventListener('submit', function() {
                document.getElementById('updateForm').style.display = 'none';
            });
        });

        function confirmLogout() {
            var confirmLogout = confirm("Are you sure you want to logout?");
            if (confirmLogout) {
                return true;
            } else {
                return false;
            }
        }
    </script>

</body>

</html>