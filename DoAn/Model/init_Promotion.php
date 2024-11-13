<?php


    require_once("database.php");
    require_once("init_Product.php");


    class initDatabasePromtion extends Database  {


        public function create_structure()
        {


            $sql = "CREATE TABLE IF NOT EXISTS Promotion (
                Promotion_ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                Promotion_Code VARCHAR(10) NOT NULL,
                Percent_Discount FLOAT NOT NULL UNIQUE,
                Date_Start DATETIME NOT NULL,
                Date_End DATETIME NOT NULL,
                Product_ID INT(6) UNSIGNED NOT NULL,
                create_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

                FOREIGN KEY (Product_ID) REFERENCES Product(Product_ID)

                )ENGINE=InnoDB;";


            // Role: 0 user, 1 admin


           $this->set_query($sql);
           $result = $this->excute_query();
           $this->close();


           echo "INIT COMPLETE";
        }   
    }




    $myinit = new initDatabasePromtion();


    $myinit->create_structure();


?>
