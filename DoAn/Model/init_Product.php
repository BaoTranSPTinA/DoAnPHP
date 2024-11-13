<?php


    require_once("database.php");
    require_once("init_Category.php");


    class initDatabaseProduct extends Database  {


        public function create_structure()
        {


            $sql = "CREATE TABLE IF NOT EXISTS Product (
                Product_ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                Product_Name VARCHAR(100) NOT NULL,
                Category_ID INT(6) UNSIGNED NOT NULL,
                Description VARCHAR(255), 
                Price FLOAT NOT NULL,
                Stock_Quantity INT NOT NULL,
                create_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

                FOREIGN KEY (Category_ID) REFERENCES Category(Category_ID)
                )ENGINE=InnoDB;";


            // Role: 0 user, 1 admin


           $this->set_query($sql);
           $result = $this->excute_query();
           $this->close();


           echo "INIT COMPLETE";
        }   
    }




    $myinit = new initDatabaseProduct();


    $myinit->create_structure();


?>
