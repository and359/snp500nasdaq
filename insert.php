<?php
//insert.php
if(isset($_POST["tweet"]))
{
 $connect = mysqli_connect("us-cdbr-east-03.cleardb.com", "b11d6e54534643", "318fd8ce", "heroku_a7bcbc3dd84756e");
 $tweet = mysqli_real_escape_string($connect, $_POST["tweet"]);
 //$sql = "DELETE FROM heroku_a7bcbc3dd84756e.single_stock_selected";
 //mysqli_query($connect, $sql);
 $sql = "INSERT INTO heroku_a7bcbc3dd84756e.single_stock_selected (Ticker) VALUES ('".$tweet."')";
 mysqli_query($connect, $sql);
}

?>
