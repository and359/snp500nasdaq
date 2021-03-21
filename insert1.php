<?php
//insert.php
if(isset($_POST["tweet5"]))
{
 $connect = mysqli_connect("us-cdbr-east-03.cleardb.com", "b11d6e54534643", "318fd8ce", "heroku_a7bcbc3dd84756e");
 $tweet = mysqli_real_escape_string($connect, $_POST["tweet5"]);
 $sql = "DELETE FROM heroku_a7bcbc3dd84756e.tbl_tweet";
 mysqli_query($connect, $sql);
 $sql = "INSERT INTO heroku_a7bcbc3dd84756e.tbl_tweet (tweet) VALUES ('".$tweet5."')";
 mysqli_query($connect, $sql);
}

?>
