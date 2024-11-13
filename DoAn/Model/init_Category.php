<?php


    require_once("database.php");


    class initDatabaseCategory extends Database  {


        public function create_structure()
        {


            $sql = "CREATE TABLE IF NOT EXISTS Category (
                Category_ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                Category_Name VARCHAR(100) NOT NULL,
                create_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )ENGINE=InnoDB;";


            // Role: 0 user, 1 admin


           $this->set_query($sql);
           $result = $this->excute_query();
           $this->close();


           echo "INIT COMPLETE";
        }   
    }




    $myinit = new initDatabaseCategory();


    $myinit->create_structure();


?>
