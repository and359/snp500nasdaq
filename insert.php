<?php
//insert.php
if(isset($_POST["tweet"]))
{
 $connect = mysqli_connect("heroku_a7bcbc3dd84756e", "b11d6e54534643", "318fd8ce", "us-cdbr-east-03.cleardb.com");
 $tweet = mysqli_real_escape_string($connect, $_POST["tweet"]);
 $sql = "INSERT INTO heroku_a7bcbc3dd84756e.tbl_tweet (tweet) VALUES ('".$tweet."')";
 mysqli_query($connect, $sql);
}

?>
