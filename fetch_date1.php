<?php								
								if(isset($_POST["tweet3"])){
								
								$host = 'us-cdbr-east-03.cleardb.com';
								$user = 'b8a00bf633cf68';
								$pass = '1a8113a0';
								$db = 'heroku_69459908ed082cc';
								$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
								$tweet1 = mysqli_real_escape_string($mysqli, $_POST["tweet3"]);
									
								
								$date3 = '';

								//query to get data from the table
								$sql = "SELECT * FROM `backtest` WHERE Ticker = '".$tweet3."';";
								$result = mysqli_query($mysqli, $sql);

								//loop through the returned data
								while ($row = mysqli_fetch_array($result)) {

									$date3 = $date3 . '"'. $row['PriceDate'].'",';
										
								}

								
								$date3 = trim($date3,",");
                
                						echo $date3;
								}
								?>
