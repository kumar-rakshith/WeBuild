<!-- booking scetion sction of admin -->


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


                <li><a href="B.php" class="aside-link">
                        <i class="fas fa-user"></i>
                        <span class="aside-item">Employee</span>
                    </a></li>

                <li><a href="#" class="aside-link" data-target="booking">
                        <i class="fas fa-user"></i>
                        <span class="aside-item">Booking</span>
                    </a></li>

                <li><a href="admin.php" class="aside-link" data-target="booking" id="logout_container" onclick="return confirmLogout()">
                        <i class="fas fa-sharp fa-solid fa-right-from-bracket"></i>
                        <span class=" aside-item" id="logout_text">Logout</span>
                    </a></li>
            </ul>
        </aside>
        <section class="main">
            <nav style="height: 70px; background-color:#fff; width: 100%; padding-left:30px; padding: 20px;">
                <h1>Booking Section</h1>
                <!-- <i class="fas fa-user-cog"></i> -->
            </nav>
            <section id="booking" class="main-content">

                <?php
                $conn = mysqli_connect('localhost', 'root', '', 'db_webuild');
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                $sql = "SELECT * FROM Submit";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    echo "<h1 class='tt'>BOOKING DETAILS</h1>";
                    echo "<table>";
                    echo "<tr><th>Name</th><th>Email</th><th>Number</th><th>Location</th><th>Message</th><th>Services</th><th>Action</th></tr>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["number"] . "</td>";
                        echo "<td>" . $row["location"] . "</td>";
                        echo "<td>" . $row["message"] . "</td>";
                        echo "<td>" . $row["services"] . "</td>";
                        // Add buttons for delete and print report
                        echo "<td>";
                        echo "<form method='post' action='delete.php'>";
                        echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
                        echo "<button type='submit' class='btn del' name='delete' onclick=\"return confirm('Are you sure you want to delete this row?')\">Delete</button>";
                        echo "</form>";

                        echo "<form method='post' action='print_report.php'>";
                        echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
                        echo "<button type='submit' class='btn' name='print'>Print Report</button>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "No data found.";
                }
                mysqli_close($conn);
                ?>
            </section>
        </section>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navLinks = document.querySelectorAll('.aside-link');
            const mainContents = document.querySelectorAll('.main-content');
            const homeSection = document.getElementById('booking');

            // Activate the home section by default
            homeSection.classList.add('active');

            navLinks.forEach(function(navLink) {
                navLink.addEventListener('click', function() {
                    const targetId = navLink.getAttribute('data-target');
                    mainContents.forEach(function(content) {
                        if (content.id === targetId) {
                            content.classList.add('active');
                        } else {
                            content.classList.remove('active');
                        }
                    });
                });
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