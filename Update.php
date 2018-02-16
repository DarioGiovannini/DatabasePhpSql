<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>

<form action="Aiuto%20update.php" method="get">
    Nome<input type="text" name="nome" value="<?php echo $_GET['Nome']?>">
    Cognome<input type="text" name="cognome" value="<?php echo $_GET['Cognome']?>">
    Mail<input type="email" name="mail" value="<?php echo $_GET['email']?>">
    <input type="submit" class="btn btn-success">
    <input type="hidden" value="<?php echo $_GET['Id']; ?>" name="Identificativo">
</form>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>
