 <?php
    require_once "settings.php";
    $dbconn = @mysqli_connect($host,$user,$pwd,$sql_db);

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 09</title>
    <style>
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #333;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Used Car Inventory</h1>

    <?php
    if($dbconn) {
        $query = "SELECT * FROM cars";
        $result = mysqli_query($dbconn,$query);
        if($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<table>";
                echo "<tr>";
                echo "<td>" . $row['car_id'] . "</td>";
                echo "<td>" . $row['make'] . "</td>";
                echo "<td>" . $row['model'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "<td>" . $row['yom'] . "</td>";
                echo "</tr>";
                echo "</table>";
}
        } else {
            echo"<p>There are no cars to display.</p>";
        }
        mysqli_close($dbconn);
    } else { 
        echo"<p>cannot connect to db</p>";
    }
?>
</body>
</html>