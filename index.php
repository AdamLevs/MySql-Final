<!DOCTYPE html>
<html>
<head>
    <title>Hello DevOps Class</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <?php
    // Connect to the database
    $host = 'adam-db-cloud.cx248m4we6k7.us-east-1.rds.amazonaws.com';
    $user = 'Adam';
    $password = 'Adam';
    $dbname = 'breached';

    // Create connection
    $conn = mysqli_connect($host, $user, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Select all rows from the breached table
    $sql = "SELECT id, email, pass, date_add FROM breached";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<h1>Breached</h1>";
        echo "<table>";
        echo "<tr><th>ID</th><th>Email</th><th>Password</th><th>Date Added</th></tr>";

        // Output the data from each row
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr><td>" . htmlspecialchars($row['id']) . "</td><td>" . htmlspecialchars($row['email']) . "</td><td>" .
            htmlspecialchars($row['pass']) . "</td><td>" . htmlspecialchars($row['date_add']) . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
    ?>
</body>
</html>
