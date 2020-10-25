<?php

class CreateDb
{
    public $servername;
    public $username;
    public $password;
    public $dbname;
    public $tablename;
    public $con;


    //class cunstruct

    public function __construct(
        $dbname = "Productdb",
        $tablename = "Producttb",
        $servername = "localhost",
        $username   = "root",
        $password = "root"    
    )
    {
        $this->dbname = $dbname;
        $this->tablename = $tablename;
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;

        // create con

        $this ->con = mysqli_connect($servername,$username,$password);

        //check con
        
        if(!$this->con){
            die("Connection failes: ". mysqli_connect_error());
        }

        //query DB
        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

        //exe query
        if(mysqli_query($this->con, $sql)){
          $this->con= mysqli_connect($servername,$username,$password,$dbname);  
        
        //create table
        $sql ="CREATE TABLE IF NOT EXISTS $tablename
                (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                 product_name VARCHAR(25) NOT NULL,
                 product_price FLOAT,
                 product_image VARCHAR(100),
                 product_quantity FLOAT,
                 product_currency VARCHAR(25) NOT NULL
                );";
                
                // INSERT INTO producttb (`id``product_name``product_price``product_image``product_quantity``product_currency`)
                // VALUES
                // ("mbp","Macbook Pro",29.99, "./upload/mac1.png",2, "EUR"),
                // ("zen","Asus Zenbook",99.99, "./upload/mac2.png",3, "USD"),
                // ("mbp","Macbook Pro",100.9, "./upload/mac3.png",5, "GBP"),
                // ("len","Lenovo",120.99, "./upload/mac4.png",8, "USD")
                

            if(!mysqli_query($this->con,$sql)){
                echo "Error creating table: ".mysqli_error($this->con);
            }
        
        }else{
            return false;
        }

    }

    //get prodcut from DB
    public function getData(){
        $sql = "SELECT * FROM $this->tablename";

        $result = mysqli_query($this->con,$sql);

        if(mysqli_num_rows($result)>0){
            return $result;
        }


    }

}