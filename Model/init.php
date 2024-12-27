<?php
require_once("database.php");
/* ----------Tao bang user ------------*/
class initDatabaseUser extends Database  {


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
            Role TINYINT(1) NOT NULL DEFAULT 0,
            create_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";


        // Role: 0 user, 1 admin


       $this->set_query($sql);
       $result = $this->execute_query();
       


       echo "INIT COMPLETE";
    }   
}

$myinit = new initDatabaseUser();
$myinit->create_structure();

/*----------Tao bang UserInformation ------------*/
class initDatabaseUserInfo extends Database {

    public function create_structure()
    {
        $sql = "CREATE TABLE IF NOT EXISTS UserInformation (
            Info_ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            Customer_ID INT(6) UNSIGNED NOT NULL,
            Address VARCHAR(255) NOT NULL,
            DateOfBirth DATE NOT NULL,
            Gender ENUM('Male', 'Female', 'Other') NOT NULL,
            create_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (Customer_ID) REFERENCES User(Customer_ID)
        )";

        $this->set_query($sql);
        $result = $this->execute_query();
        

        echo "INIT COMPLETE";
    }
}

$myinit = new initDatabaseUserInfo();
$myinit->create_structure();

/*----------Tao bang Category ------------*/
class initDatabaseCategory extends Database  {


    public function create_structure()
    {


        $sql = "CREATE TABLE IF NOT EXISTS Category (
            Category_ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            Category_Name VARCHAR(100) NOT NULL,
            create_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";


        // Role: 0 user, 1 admin


       $this->set_query($sql);
       $result = $this->execute_query();
       


       echo "INIT COMPLETE";
    }   
}

$myinit = new initDatabaseCategory();
$myinit->create_structure();
/*----------Tao bang Product ------------*/
class initDatabaseProduct extends Database  {


    public function create_structure()
    {


        $sql = "CREATE TABLE IF NOT EXISTS Product (
            Product_ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            Product_Name VARCHAR(100) NOT NULL,
            Category_ID INT(6) UNSIGNED NOT NULL,
            avatar VARCHAR(500),
            Description VARCHAR(255), 
            Price FLOAT NOT NULL,
            Stock_Quantity INT NOT NULL,
            create_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (Category_ID) REFERENCES Category(Category_ID)
            )";


        // Role: 0 user, 1 admin


       $this->set_query($sql);
       $result = $this->execute_query();
       


       echo "INIT COMPLETE";
    }   
}


$myinit = new initDatabaseProduct();
$myinit->create_structure();




/*----------Tao bang Bill ------------*/
class initDatabaseBill extends Database  {


    public function create_structure()
    {


        $sql = "CREATE TABLE IF NOT EXISTS Bill (
            Order_ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            Customer_ID INT(6) UNSIGNED NOT NULL,
            Total_Amount DECIMAL(10,2) NOT NULL,
            Ship_Address VARCHAR(255) NOT NULL,
            Order_Status VARCHAR(255) NOT NULL,
            create_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

            FOREIGN KEY (Customer_ID) REFERENCES User(Customer_ID)
            )";


        // Role: 0 user, 1 admin


       $this->set_query($sql);
       $result = $this->execute_query();
       


       echo "INIT COMPLETE";
    }   
}




$myinit = new initDatabaseBill();
$myinit->create_structure();



/*----------Tao bang Detail ------------*/
class initDatabaseDetail extends Database  {


    public function create_structure()
    {


        $sql = "CREATE TABLE IF NOT EXISTS Detail (
            Cart_ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            Order_ID INT(6) UNSIGNED NOT NULL, 
            Product_ID INT(6) UNSIGNED NOT NULL,
            Quantity INT NOT NULL,
            create_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (Order_ID) REFERENCES Bill(Order_ID),
            FOREIGN KEY (Product_ID) REFERENCES Product(Product_ID)
            )";


        // Role: 0 user, 1 admin


       $this->set_query($sql);
       $result = $this->execute_query();
       


       echo "INIT COMPLETE";
    }   
}
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
            )";


        // Role: 0 user, 1 admin


       $this->set_query($sql);
       $result = $this->execute_query();
       


       echo "INIT COMPLETE";
    }   
}


$myinit = new initDatabaseDetail();
$myinit->create_structure();

$myinit = new initDatabaseCart();
$myinit->create_structure();







