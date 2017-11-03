<?php
include 'database_connect.php';

$batchNumber = isset($_POST['batchNumber']) ? $_POST['batchNumber'] : "";
$batchDate = isset($_POST['batchDate']) ? $_POST['batchDate'] : "";
$batchType = isset($_POST['batchNumber']) ? $_POST['batchType'] : "";
$batchView = $batchType . "_batch ";
$batchDownloadLink = $batchNumber . "_" . $batchDate . "_" . $batchType . ".csv";


			$batch_query_1 = "SELECT * FROM {$batchView} WHERE batchID = {$batchNumber}";
			$result_1 = mysqli_query($connect, $batch_query_1);
			if($result_1) {
				// Success
				// redirect_to("somepage.php");
				$batchFile = fopen($batchDownloadLink, "w") or die("unable to open file");
				foreach ($result_1 as $fields){
					fputcsv($batchFile, $fields);
				}
				fclose($batchFile);
			}else{
				//Failure
				// $messaage = 
				die("Database query failed." . mysqli_error($connect));
			}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		while ($row = mysqli_fetch_row($result_1)) {
			# code...
			var_dump($row);
			echo "<hr />";
		}
	?>

</body>
</html>
