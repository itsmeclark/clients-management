<?php
include('../database/database.php');

$sql_clients = 'SELECT COUNT(id) FROM clients';
$result = mysqli_query($conn, $sql_clients);
$total = mysqli_fetch_assoc($result);

$sql_amount = "SELECT SUM(amount) FROM clients WHERE payment_status = 'paid'";
$amount = mysqli_query($conn, $sql_amount);
$total_amount = mysqli_fetch_assoc($amount);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <title>Document</title>
</head>
<body>

<?php

include('../utils/navbar.html');

?>
<div class="title_contianer">
    Dashboard
</div>
<div class="main-container">
    <div class="inside-container">
        <div class="total-clients">
            <p>TOTAL CLIENTS</p>
            <?php
            echo "<p>{$total["COUNT(id)"]}</p>";
          
            ?>
            <p>+ 5 clients this month</p>
            <div class="icon-arrowup">
                <i class="fa-solid fa-arrow-up"></i>
            </div>
        </div>
        <div class="total-earnings">
            <p>TOTAL EARNINGS</p>
            <?php
              echo "<p>$ {$total_amount["SUM(amount)"]}</p>";
            ?>
            <p>+ $5 dollars this month</p>
            <div class="icon-arrowup">
                <i class="fa-solid fa-arrow-up"></i>
            </div>
        </div>
        <div class="pending-task"></div>
    </div>
    <div class="clients-container">
        <?php
            $sql_allclients = "SELECT first_name FROM clients";
            $clients = mysqli_query($conn, $sql_allclients);

            if ($clients){
                while($row = mysqli_fetch_assoc($clients)){
                    echo $row['first_name'] . "<br>";
                }
            }
        ?>
    </div>
</div>
<script src="https://kit.fontawesome.com/edcced4a53.js" crossorigin="anonymous"></script>
<script src='../assets/js/navbar.js'></script>
</body>
</html>