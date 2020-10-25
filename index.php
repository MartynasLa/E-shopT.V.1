<?php

    // start session
    session_start();

    require_once('php/CreateDb.php');
    require_once('./php/component.php');

        //create instance
    $database = new CreateDb("Productdb","Producttb");

    if(isset($_POST['add'])){
        //print_r($_POST['product_id']);
        if(isset($_SESSION['cart'])){

            $item_array_id = array_column($_SESSION['cart'],"product_id");
            

            if(in_array($_POST['product_id'],$item_array_id)){
                echo'<script>alert("product is already added in the cart..!"</script>';
                echo'<script>window.location = "index.php"</script>';
            }else{

                $count = count($_SESSION['cart']);
                $item_array=array(
                    'product_id'=>$_POST['product_id']
                );
                $_SESSION['cart'][$count]= $item_array;
                
            }
        }else{
            
            
            //create session var
            $_SESSION['cart'][0]=$item_array;
            print_r($_SESSION['cart']);
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Shop</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
    require_once('php/header.php');
?>
<div class="container">
    <div class="row text-center py-5">
        <?php 
            $result = $database->getData();
            while($row = mysqli_fetch_assoc($result)){
                component($row['product_name'],$row['product_price'],$row['product_image'],
                $row['product_quantity'],$row['product_currency'],$row['id']);
            }
        ?>
    </div>
</div>    

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>