<?php
//fetch.php
$connect = mysqli_connect("us-cdbr-east-03.cleardb.com", "b11d6e54534643", "318fd8ce", "heroku_a7bcbc3dd84756e");
$query = "SELECT * FROM heroku_a7bcbc3dd84756e.single_stock_selected";
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_array($result))
 {
  echo '<p>'.$row["Ticker"].'</p>';
 }
}
?>



