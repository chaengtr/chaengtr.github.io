<!DOCTYPE html>
<html>
<head>
	<title>Basic PHP</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="container">
<section class="hero is-dark">
    <div class="hero-body">
    <div class="container">
            <h1 class="title">BMI Calculator</h1>
            <h2 class="subtitle">
    </div>
    </div>
</section>

<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$image = $target_dir . basename($_FILES["image"]["name"]);
$succeed = 0;
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	$succeed = 1;
} else {
echo "Sorry, there was an error uploading your csv file.";
}
$succeed = 0;
if (move_uploaded_file($_FILES["image"]["tmp_name"], $image)) {
	$succeed = 1;
} else {
echo "Sorry, there was an error uploading your image file.";
}

function calBMI(float $w, float $h) {
	$bmi = $w / ($h / 100) ** 2;
	return number_format($bmi, 2, ".", "");
}

function resultBMI(float $bmi) {
	if ($bmi < 18.50) {
		$result = "Underweight";
	} elseif ($bmi < 23) {
		$result = "Normal";
	} elseif ($bmi < 25) {
		$result = "Obese (Level 1)";
	} elseif ($bmi < 30) {
		$result = "Obese (Level 2)";
	} else {
		$result = "Obese (Level 3)";
	}
	return $result;
}
?>

<div class="info">
	<?php 
		echo "<img style='width:100px; margin-top: 10px' src='".$image."'/>&nbsp;"; 
		echo "<br>";
		echo "Welcome ".$_POST["name"];
		echo "<br>";
		echo "Your birthday is ".$_POST["birthday"];
	?>

	<table width="600" border="1">
		<tr>
			<th width="100"><div align="center">Date</div></th>
			<th width="100"><div align="center">Weight</div></th>
			<th width="100"><div align="center">Height</div></th>
			<th width="100"><div align="center">BMI</div></th>
			<th width="150"><div align="center">BMI result</div></th>
		</tr>
	<?php
	$csv = fopen($target_file, "r"); 
	$i = 0;
	while (($file = fgetcsv($csv, 1000, ",")) !== FALSE) {
		if ($i > 0) {
			$bmi = calBMI($file[1], $file[2]);
	?>
			<tr>
				<td><div align="center"><?php echo $file[0]; ?></div></td>
				<td><div align="center"><?php echo $file[1]; ?></div></td>
				<td><div align="center"><?php echo $file[2]; ?></div></td>
				<td><div align="center"><?php echo $bmi; ?></div></td>
				<td><div align="center"><?php echo resultBMI($bmi); ?></div></td>
			</tr> 
	<?php
		}
		$i++;
	}
	fclose($csv);
	?>
	</table>
</div>
</body>
</html>