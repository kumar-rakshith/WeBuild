<!-- When update btn is clicked it is Redirect to this page -->

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

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];
    $name = $_GET['name'];
    $role = $_GET['role'];
    $description = $_GET['description'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['update_id'];
    $name = $_POST['update_name'];
    $role = $_POST['update_role'];
    $description = $_POST['update_description'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="Dashboard.css" />
    <!-- Font Awesome Cdn Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <style>
        .tt {
            text-align: center;
            font-size: 30px;
            font-family: 'Times New Roman', Times, serif;
            margin: 25px 20px;
        }

        .btn {
            padding: 8px 16px;
            background-color: #f5bf23;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #a17a03;
        }

        .update-form {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .update-nav {
            height: 70px;
            background-color: #fff;
            width: 100%;
            padding-left: 30px;
            padding: 20px;
        }

        .update-heading {
            text-align: center;
            font-size: 30px;
            font-family: 'Times New Roman', Times, serif;
            margin: 25px 20px;
        }

        .update-form {
            padding: 20px;
            /* background-color: #f9f9f9; */
            /* border-radius: 10px; */
            /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); */
        }

        .form-group {
            margin-bottom: 15px;
            display: flex;
            flex-direction: row;
            align-items: center;
        }



        .form-input {
            font-size: 2vh;
            width: 600px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-left: 60px;
        }

        .yy {
            margin-left: 52px;
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

        .form-group label {
            font-family: 'Times New Roman', Times, serif;
            margin-right: 40px;
            font-size: 3vh;
            /* Adjust the right margin for spacing */
        }

        .form-input-text {
            min-height: 90px;
            max-height: 120px;
            max-width: 600px;
            min-width: 600px;
            padding: 5px;

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


                <li><a href="#" class="aside-link" data-target="emp">
                        <i class="fas fa-user"></i>
                        <span class="aside-item">Employee</span>
                    </a></li>

                <li><a href="C.php" class="aside-link">
                        <i class="fas fa-user"></i>
                        <span class="aside-item">booking</span>
                    </a></li>
                <!-- Add -->
            </ul>
        </aside>
        <section class="main update-section">
            <nav class="update-nav">
                <h1>Employee Update Section</h1>
            </nav>
            <h1 class="update-heading">Update Employee Information</h1>
            <form method="post" action="update_employee.php" class="update-form">
                <input type="hidden" name="update_id" value="<?php echo $id; ?>">
                <div class="form-group">
                    <label for="update_name">Name:</label>
                    <input type="text" id="update_name" name="update_name" value="<?php echo $name; ?>" class="form-input yy"><br>
                </div>
                <div class="form-group">
                    <label for="update_role">Role:</label>
                    <input type="text" id="update_role" name="update_role" value="<?php echo $role; ?>" class="form-input"><br>
                </div>
                <div class="form-group">
                    <label for="update_description">Description:</label>
                    <textarea id="update_description" name="update_description" class="form-input-text"><?php echo $description; ?></textarea><br>
                </div>
                <button type="submit" class="btn btn-update" onclick="confirmUpdate()">Update</button>
            </form>
        </section>

    </div>
    <script>
        function confirmUpdate() {
            if (confirm("Are you sure you want to update this employee Details?")) {
                document.getElementById("updateForm").submit();
            }
        }
    </script>


</body>

</html>