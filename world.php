<?php

header('Access-Control-Allow-Origin: *');
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

//$stmt = $conn->query("SELECT * FROM countries");

$country = $_GET['country'];

// ensures that a country is received, shows an error if not
if(!isset($country)){
  echo nl2br("ERROR: Invalid entry for country queried for! Either the country doesn't exist in this database
  or it was entered incorrectly. Please check your input.\n");
} else {
  // currently unfiltered and unsanitized
  $stmt = $conn ->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
  $results = $stmt->fetch(PDO::FETCH_ASSOC);
}

// getting the country in the database
if ($results == false){
  echo "ERROR: No records acquired from the database. Please check your input";
} else {
  echo htmlentities($results['name']);
}

?>
<ul>
  <!--Remove php code for now -->
<?php/* foreach ($results as $row): ?>
  <!--<li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>-->
<?php*/ endforeach;?>
</ul>

