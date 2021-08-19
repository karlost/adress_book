<?php 

?>
<html>
    <head>
      <meta charset="UTF-8">
  <meta name="description" content="Adresář kontaktů">
  <meta name="keywords" content="PHP, HTML, CSS, JavaScript">
  <meta name="author" content="Filip Černý">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/css.css">
        <title>
           Adresář Kontaktů
        </title>
    </head>
    <body>
     <a href="pridat.php">Přidat Kontakt</a>

      <table id="adresar">
            <tr>
              <th>Jmeno</th>
              <th>Přijmění</th>
              <th>Telefoní čislo </th>
              <th>E-Mail</th>
              <th>Poznámka</th>
              <th>akce</th>
            </tr>
            
      <?php
      
include 'mysql.php';
// připojení
$conn = new mysqli($servername, $username, $password, $dbname);
// kontrola připojení
if ($conn->connect_error) {
    die("Připojení selhalo : " . $conn->connect_error);
}
 
$sql = "SELECT id, jmeno, prijmeni, telefon,email,poznamka FROM adresar";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // vystup dat každého rádku
    while($row = $result->fetch_assoc()) {
        
    echo '  
            <tr>
              <td> '.$row['jmeno'].'</td>
              <td> '.$row['prijmeni'].'</td>
              <td>'. $row['telefon']. '</td>
              <td>'. $row['email']. '</td>
              <td>'. $row['poznamka']. '</td>
              <td><a href=index.php?id='. $row["id"].'>Odstranit</a>/<a href=upravit.php?id='. $row["id"].'>upravit</a></td>
            </tr>
            
          ';
      
      
    }
  
} else {
    echo "0 kontaktu";
}
if(isset($_GET['id'])) {
  
  
  $id = $_GET['id'];
 
  
  // sql k odstranění záznamu
  $sql = "DELETE FROM adresar WHERE id=$id";
  
  if ($conn->query($sql) === TRUE) {
    echo "Kontakt odstraněn";
  } else {
  
    echo "chyba při odstranovaní kontaktu : " . $conn->error;
  }
  {  
    header("location:/kontakt-od");  
  } 
  $conn->close();
   }
?>
      </table>
    </body>

</html>