<?php
$conn = mysqli_connect('localhost', 'root', '', 'db_webuild');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM Submit";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    echo"<h1 class='tt'>BOOKING DETAILS</h1>";
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
