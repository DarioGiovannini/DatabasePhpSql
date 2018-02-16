<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>
<body>a
<h1> Tabella </h1>
<form action="" method="get">
    <div data-role="main" class="ui-content">
        <a href="#Aggiungi" data-rel="popup" class="ui-btn ui-btn-inline ui-corner-all ui-icon-check ui-btn-icon-left">Aggiungi</a>
        <div data-role="popup" id="Aggiungi" class="ui-content" style="min-width:250px;">
            <form method="post" action="/action_page_post.php">
                <div>
                    <h3>Dati Tabella</h3>
                    <form action="" method="post">
                        <label for="usrnm" class="ui-hidden-accessible">Nome</label>
                        <input type="text" name="user" id="usrnm" placeholder="Nome" required>
                        <label for="Cognome" class="ui-hidden-accessible">Cognome</label>
                        <input type="text" name="Cognome" id="Cognome" placeholder="Cognome" required>
                        <label for="email" class="ui-hidden-accessible">email</label>
                        <input type="text" name="email" id="email" placeholder="email" required>
                        <input type="submit" data-inline="true" value="Aggiungi" class="btn btn-success">
                    </form>
                </div>
            </form>
        </div>
    </div>
</form>

<?php
$server = "localhost";
$utente = "root";
$password = "";
$database = "databasephpsql";
$conn = new mysqli($server, $utente, $password, $database);
if ($conn->connect_error) {
    die("Connessione Fallita: " . $conn->connect_error);
}
$sql = "SELECT * FROM tabella";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<table class='table table-hoover'>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Id"]. "</td><td>" . $row["Nome"]. "</td><td>" . $row["Cognome"]. "</td><td>" . $row["email"] . "</td><td>" . "<form action=\"\" method=\"get\">
        <div data-role=\"main\" class=\"ui-content\">
        <a href=\"#Update\" data-rel=\"popup\" class=\"ui-btn ui-btn-inline ui-corner-all ui-icon-check ui-btn-icon-left\">Update</a>
        <div data-role=\"popup\" id=\"Update\" class=\"ui-content\" style=\"min-width:250px;\">
            <form method=\"post\" action=\"/action_page_post.php\">
                <div>
                    <h3>Dati Tabella</h3>
                    <form action='' method='Post'>
                        <label for=\"usrnm\" class=\"ui-hidden-accessible\">Nome</label>
                        <input type=\"text\" name=\"user\" id=\"usrnm\" placeholder=\"Nome\">
                        <label for=\"Cognome\" class=\"ui-hidden-accessible\">Cognome</label>
                        <input type=\"text\" name=\"Cognome\" id=\"Cognome\" placeholder=\"Cognome\">
                        <label for=\"email\" class=\"ui-hidden-accessible\">email</label>
                        <input type=\"text\" name=\"email\" id=\"email\" placeholder=\"email\">
                        <input type=\"submit\" data-inline=\"true\" value=\"Aggiorna\" class=\"btn btn-success\">
                    </form>                 
                </div>
            </form>
        </div> </form>" . "</td><td>" ."<form action=\"\" method=\"get\">
        <label for='submit'></label>
        <input type=\"hidden\" name=\"submitted\" value=\"1\"/>
        <input type=\"submit\" value=\"Delete\" class=\"btn btn-danger\" name='submit' id='submit' > </form>" ."</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Nessun Risultato";
}
?>


<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>
<h1>ciao</h1>
<?php
if(isset($_POST['user']) && isset($_POST['Cognome']) && isset($_POST['email'])){
    $nome=$_POST['user'];
    $cognome=$_POST['Cognome'];
    $email=$_POST['email'];
    $sql = "INSERT INTO tabella(Nome, Cognome, email)
VALUES ($nome, $cognome, $email)";
    $conn->query($sql);
}
