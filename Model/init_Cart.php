<?php


    require_once("database.php");
    require_once ("init_User.php"); 
    require_once ("init_Product.php"); 


    class initDatabaseCart extends Database  {


        public function create_structure()
        {


            $sql = "CREATE TABLE IF NOT EXISTS Cart (
                Cart_ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                Customer_ID INT(6) UNSIGNED NOT NULL,
                Product_ID INT(6) UNSIGNED NOT NULL,
                Quantity INT NOT NULL,
                create_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                FOREIGN KEY (Customer_ID) REFERENCES User(Customer_ID),
                FOREIGN KEY (Product_ID) REFERENCES Product(Product_ID)
                )ENGINE=InnoDB;";


            // Role: 0 user, 1 admin


           $this->set_query($sql);
           $result = $this->excute_query();
           $this->close();


           echo "INIT COMPLETE";
        }   
    }




    $myinit = new initDatabaseCart();


    $myinit->create_structure();


?>
