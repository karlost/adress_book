
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="css.css">
<title>Upravit Kontakt</title>
</head>
<body>
<?php

include 'mysql.php';
// připojení
$conn = new mysqli($servername, $username, $password, $dbname);
// kontrola připojení
if ($conn->connect_error) {
    die("Připojení selhalo : " . $conn->connect_error);
}
if(isset($_GET['id'])) {
$id = $_GET['id'];

$sql = "SELECT * FROM adresar where id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // vystup dat každého rádku
    while($row = $result->fetch_assoc()) {
        
    echo '  
    <form action="upravit.php" method="post">
    <p>
        <label>Jmeno:</label>
        <input type="text" name="jmeno" value="'.$row['jmeno'].'">  
    </p>
    <p>
    <label>přijmení:</label>
    <input type="text" name="prijmeni" value="'.$row['prijmeni'].'">  
</p>
    <p>
        <label>Telefon:</label>
        <input type="tel" name="telefon" value="'.$row['telefon'].'">  
    </p>
    <p>
        <label>E-mail:</label>
        <input type="email" name="email" value="'.$row['email'].'"> 
    </p>
    <p>
        <label>Poznámka:</label>
        <input type="text" name="poznamka" value="'.$row['poznamka'].'">  
    </p>
    <input type="hidden"  name="id" value="'.$row['id'].'">
    <input type="submit" value="Submit">
</form>
            
          ';
          
      
    }
} else {
    echo "0 kontaktu";
}
 } 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
include 'mysql.php';

$jmenoprijmeni = $_POST['jmeno'];
$jmenoprijmeni = $_POST['prijmeni'];
$telefon = $_POST['telefon'];
$email = $_POST['email'];
$poznamka = $_POST['poznamka'];
$id = $_POST['id'];
// připojení
$conn = new mysqli($servername, $username, $password, $dbname);
// kontrola připojení
if ($conn->connect_error) {
    die("Připojení selhalo : " . $conn->connect_error);
}

$sql = "UPDATE adresar SET jmeno='$jmeno',prijmeni='$prijmeni',telefon='$telefon',email='$email',poznamka='$poznamka' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
  echo "Kontakt aktualizovan";
} else {
  echo "Chyba: " . $sql . "<br>" . $conn->error;
}

$conn->close();
 }
?>

</body>
</html>