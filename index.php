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
    $host = 'Put_Your_DB-ID_HERE';
    $user = 'Put_the_user_that_read_the_DB';
    $password = 'Put_the_password_for_that_user';
    $dbname = 'Put_the_name_of_the_DB(the table)';

    // Create connection
    $conn = mysqli_connect($host, $user, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Select all rows from the breached table
    $sql = "SELECT * from $dbname";
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
