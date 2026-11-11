<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
</head>
<body>
    <h1>Search Results</h1>

    <?php
    require_once("settings.php");

    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);

    if (!$conn) {
        echo "<p>Database connection failure: " . mysqli_connect_error() . "</p>";
    } else {
          // inspect input availability, not null 
        if (isset($_GET['model']) && trim($_GET['model']) !== '') {    
      // avoid sql injection
        $model = mysqli_real_escape_string($conn, trim($_GET['model']));
            // cmd to search near perfect keyword
            $sql = "SELECT * FROM cars WHERE model LIKE '%$model%'";
            
            $result = mysqli_query($conn, $sql);
// if any result returns
            if ($result && mysqli_num_rows($result) > 0) {
                echo "<table border='1' cellpadding='5'>";
                echo "<tr><th>ID</th><th>Make</th><th>Model</th><th>Price ($)</th><th>Year</th></tr>";
                //print to table
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['car_id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['make']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['model']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['price']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['yom']) . "</td>";
                    echo "</tr>";
                }
                echo "</table>";

                mysqli_free_result($result);
            } else {
                echo "<p> No matching cars found.</p>";
            }
        } else {
            echo "<p>Please enter a model to search.</p>";
        }

        mysqli_close($conn);
    }
    ?>
    <br>
    <a href="search_form.php">Search Again</a>
</body>
</html>