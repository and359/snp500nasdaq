<?php
//fetch.php
$connect = mysqli_connect("heroku_a7bcbc3dd84756e", "b11d6e54534643", "318fd8ce", "testing");
$query = "SELECT * FROM heroku_a7bcbc3dd84756e.tbl_tweet ORDER BY tweet_id DESC";
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_array($result))
 {
  echo '<p>'.$row["tweet"].'</p>';
 }
}
?>



