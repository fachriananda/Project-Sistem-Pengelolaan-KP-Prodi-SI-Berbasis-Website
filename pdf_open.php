<?php
$file = $_GET["file"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PDF File</title>
</head>
<body>
	<iframe src="../../mahasiswa/file/<?php echo $file; ?>" frameborder="0"></iframe>
</body>
</html>