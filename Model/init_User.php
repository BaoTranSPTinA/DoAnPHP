<?php

require_once("database.php");

class initDatabaseUser extends Database {

    public function create_structure()
    {
        $sql = "CREATE TABLE IF NOT EXISTS User (
            Customer_ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            Customer_Name VARCHAR(100) NOT NULL,
            username VARCHAR(30) NOT NULL UNIQUE,
            Password VARCHAR(30) NOT NULL UNIQUE,
            Email VARCHAR(100) NOT NULL,
            Phone_Number VARCHAR(30) NOT NULL UNIQUE,
            Address VARCHAR(100) NOT NULL,
            create_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            ) ENGINE=InnoDB;";

        // Role: 0 user, 1 admin

        $this->set_query($sql);
        $result = $this->execute_query(); // Corrected method name
        $this->close();

        echo "INIT COMPLETE";
    }
}

$myinit = new initDatabaseUser();
$myinit->create_structure();

?>
