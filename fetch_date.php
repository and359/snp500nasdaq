<?php								
								if(isset($_POST["tweet2"])){
								
								$host = 'us-cdbr-east-03.cleardb.com';
								$user = 'b8a00bf633cf68';
								$pass = '1a8113a0';
								$db = 'heroku_69459908ed082cc';
								$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
								$tweet1 = mysqli_real_escape_string($mysqli, $_POST["tweet2"]);
									
								$date2 = '';

								//query to get data from the table
								$sql = "SELECT * FROM `backtest` WHERE Ticker = '".$tweet2."';";
								$result = mysqli_query($mysqli, $sql);

								//loop through the returned data
								while ($row = mysqli_fetch_array($result)) {

									$date2 = $date2 . '"'. $row['PriceDate'] .'",';		
								}

								$date2 = trim($date2,",");
								
                						$myfile = fopen("mydate.txt", "w");	
                						echo $date2;
								//file_put_contents('mydate.txt', $date2, FILE_APPEND | LOCK_EX);
									
								/*$myfile = fopen("mydate.txt", "w") or die("Unable to open file!");								
								//fwrite($myfile, $date2);
								file_put_contents($myfile, $date2);
								fclose($myfile);*/
								}
								?>
