<?php
require_once('TCPDF-main/tcpdf.php');
$servername = "localhost";
$username = "root";
$password = "";
$database = "db_webuild";

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['print'])) {
    $id = $_POST['id'];
    $sql = "SELECT * FROM Submit WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $pdf_content = "
        <html>
        <head>
            <style>
                table {
                    width: 100%;
                    border-collapse: collapse;
                }
                th, td {
                    border: 1px solid #dddddd;
                    text-align: left;
                    padding: 8px;
                }
                th {
                    background-color: #f2f2f2;
                }
                .title {
                    text-align: center;
                }
            </style>
        </head>
        <body>
            <div class='title'>
                <h1>WeBuild</h1>
                <h2>BOOKING REPORT</h2>
            </div>
            <table>
                <tr>
                    <th>Field</th>
                    <th>Value</th>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>" . $row['name'] . "</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>" . $row['email'] . "</td>
                </tr>
                <tr>
                    <td>Number</td>
                    <td>" . $row['number'] . "</td>
                </tr>
                <tr>
                    <td>Location</td>
                    <td>" . $row['location'] . "</td>
                </tr>
                <tr>
                    <td>Message</td>
                    <td>" . $row['message'] . "</td>
                </tr>
                <tr>
                    <td>Services</td>
                    <td>" . $row['services'] . "</td>
                </tr>
            </table>
        </body>
    </html>
    
        ";
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Your Name');
        $pdf->SetTitle('Report');
        $pdf->SetSubject('Report');
        $pdf->SetKeywords('Report, PDF, Download');
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->AddPage();
        $pdf->writeHTML($pdf_content, true, false, true, false, '');
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="report.pdf"');
        echo $pdf->Output('report.pdf', 'D');
        exit();
    } else {
        echo "Error: Record not found.";
    }
} else {
    echo "Error: Invalid request.";
}
?>
