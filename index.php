<?php
// Check if setup has already been completed
if (file_exists('setup_completed.flag')) {
    echo "Setup has already been completed. The SQL setup won't run again. If not created, open this project in the file explorer and delete setup_completed.flag. It should be next to the index.php file.";
} else {
    define('DB_HOST', 'localhost');
    define('DB_USER', 'cms');
    define('DB_PASS', 'cms');

    // Create Connection
    $link = new mysqli(DB_HOST, DB_USER, DB_PASS);

    // Check Connection
    if ($link->connect_error) {
        die('Connection Failed: ' . $link->connect_error);
    }

    // Create the 'CanteenDB' database if it doesn't exist
    $sqlCreateDB = "CREATE DATABASE IF NOT EXISTS CanteenDB";
    if ($link->query($sqlCreateDB) === TRUE) {
        echo "Database 'CanteenDB' created successfully.<br>";
    } else {
        echo "Error creating database: " . $link->error . "<br>";
    }

    // Switch to using the 'CanteenDB' database
    $link->select_db('CanteenDB');

    // Execute SQL statements from "CanteenDB.txt"
    function executeSQLFromFile($filename, $link) {
        $sql = file_get_contents($filename);

        // Execute the SQL statements
        if ($link->multi_query($sql) === TRUE) {
            echo "SQL statements executed successfully.";
            // Set the flag to indicate setup is complete
            file_put_contents('setup_completed.flag', 'Setup completed successfully.');
        } else {
            echo "Error executing SQL statements: " . $link->error;
        }
    }

    // Execute SQL statements from "CanteenDB.txt"
    executeSQLFromFile('CanteenDB.txt', $link);
    // do {
    //     if ($res = $link->store_result()) {
    //       $res->free();
    //     }
    // } while ($link->more_results() && $link->next_result()); 
    // $result = $link -> query("SELECT * FROM Accounts LIMIT 5;");
    // echo $result -> num_rows;

    // Close the database connection
    $link->close();
}
?>

<a href="customerSide/home/home.php">Home</a>
