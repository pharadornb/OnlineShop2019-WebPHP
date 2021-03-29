<?php

    // Creating a database connection
    $connection = mysqli_connect("localhost", "webtech62_g40", "132075", "webtech62_g40");
    if (!$connection) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Selecting a database 

    $db_select = mysqli_select_db($connection, "webtech62_g40");
    if (!$db_select) {
        die("Database selection failed: " . mysqli_connect_error());
    }
    mysqli_query($connection, "SET NAMES 'utf8'");
?>