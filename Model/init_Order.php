<?php


    require_once("database.php");
    require_once("init_User.php");


    class initDatabaseOrder extends Database  {


        public function create_structure()
        {


            $sql = "CREATE TABLE IF NOT EXISTS OrderList (
                Order_ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                Customer_ID INT(6) UNSIGNED NOT NULL,
                Date_Order DATETIME NOT NULL,
                Total_Amount DECIMAL(10,2) NOT NULL,
                Ship_Address VARCHAR(255) NOT NULL,
                Order_Status VARCHAR(255) NOT NULL,
                create_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

                FOREIGN KEY (Customer_ID) REFERENCES User(Customer_ID)
                )ENGINE=InnoDB;";


            // Role: 0 user, 1 admin


           $this->set_query($sql);
           $result = $this->excute_query();
           $this->close();


           echo "INIT COMPLETE";
        }   
    }




    $myinit = new initDatabaseOrder();


    $myinit->create_structure();


?>
