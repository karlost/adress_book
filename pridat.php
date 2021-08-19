
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="css.css">
<title>Přidat Kontakt</title>
</head>
<body>
<form action="pridat.php" method="post">
    <p>
        <label>Jmeno:</label>
        <input type="text" name="jmeno">
    </p>
    <p>
        <label>Přijmení:</label>
        <input type="text" name="prijmeni">
    </p>
    <p>
        <label>Telefon:</label>
        <input type="tel" name="telefon">
    </p>
    <p>
        <label>E-mail:</label>
        <input type="email" name="email">
    </p>
    <p>
        <label>Poznámka:</label>
        <input type="text" name="poznamka">
    </p>
    <input type="submit" value="Submit">
</form>
</body>
</html>
<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
include 'mysql.php';

$jmeno = $_POST['jmeno'];
$prijmeni = $_POST['prijmeni'];
$telefon = $_POST['telefon'];
$email = $_POST['email'];
$poznamka = $_POST['poznamka'];

// připojení
$conn = new mysqli($servername, $username, $password, $dbname);
// kontrola připojení
if ($conn->connect_error) {
    die("Připojení selhalo : " . $conn->connect_error);
}

$sql = "INSERT INTO adresar (jmeno,prijmeni, telefon, email, poznamka)
VALUES ('$jmeno','$prijmeni', '$telefon', '$email' , '$poznamka')";

if ($conn->query($sql) === TRUE) {
  echo "Nový kontakt Přidan";
} else {
  echo "Chyba: " . $sql . "<br>" . $conn->error;
}

$conn->close();
 }
?>