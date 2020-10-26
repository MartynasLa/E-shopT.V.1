<?php
    $from = $_POST["from"];
    $to = $_POST["to"];
    $amount = $_POST["amount"];


    $string = $from . "_" . $to;
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://free.currconv.com/api/v7/convert?q=" . $string . "&compact=ultra&apiKey={56e67b4bc1c06d9421cd}",
        CURLOPT_RETURNTRANSFER => 1
    ));

    $response = curl_exec($curl);
    $response = json_decode($response, true);
    $rate = $response[$string];

    $total = $rate * $amount;
    echo "$amount $from = $total $to";
    // print_r($total);    

?>

<button><a class="dropdown-item" href="index.php">Go back</a></button>