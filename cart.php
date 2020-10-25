<?php

session_start();

require_once("php/CreateDb.php");
require_once("php/component.php");

$db = new CreateDb("Productdb","Producttb");

if(isset($_POST['remove'])){
    if($_GET['action'] == 'remove'){
      foreach ($_SESSION['cart'] as $key => $value){
        if($value['product_id'] == $_GET['id']){
            unset($_SESSION['cart'][$key]);
            echo "<script>alert('Product has been Remove...!')</script>";
            echo "<script> window.location = 'cart.php' </script>";
        }  
      }  
    }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>

     <!-- Font Awesome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">

<?php 
    require_once( "php/header.php");
?>

<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shooping-cart">
                <h6>My cart</h6>
                <hr>

                <?php
                $total = 0;
                if(isset($_SESSION['cart'])){
                    $product_id = array_column($_SESSION['cart'],'product_id');

                    $result = $db->getData();
                    while($row = mysqli_fetch_assoc($result)){
                    foreach($product_id as $id){
                        if($row['id'] == $id){
                            cartElement($row['product_name'],$row['product_price'],$row['product_image'],
                            $row['product_currency'],$row['product_quantity'],$row['id']);
                            $total = $total + (int)$row['product_price'];
                        }
                    }  
                }
                }else{
                    echo "<h5> Cart is empty</h5>";
                }
                
                ?>

             </div>
        </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-50">
                <div class="pt-4">
                    <h6>Price Details</h6>
                    <hr>
                    <div class="row price-details">
                    <div class="col-m-6">
                        <?php 
                            if(isset($_SESSION['cart'])){
                                $count = count($_SESSION['cart']);
                                echo "<h6>Price($count items)</h6>";
                            }else{
                                echo "<h6>Price (0 items)</h6>";
                            }
                        ?>
                        <hr>
                        <h6>Total Amount to pay:</h6>
                    </div>
                    <div class="col-md-6">
                        <h6>&euro;<?php echo $total; ?></h6>
                        <hr>
                        <h6 class=""> &euro; <?php echo  $total; ?> </h6>
                    </div>
                    </div>
                </div>

        </div>
    </div></px-5>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>