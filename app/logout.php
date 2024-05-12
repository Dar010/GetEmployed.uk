<html lang = "en">
<head>
<link rel="stylesheet" href="style.css">
<meta charset = "utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="minified.css">
<script src = "jquerylib.js"></script>
<script src = "latestscript.js"></script>
</head>
<body>
<?php
session_start();
if (session_destroy())
{
	header("location:index.php");
}
?>
</body>
</html>