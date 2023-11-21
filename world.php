<?php
error_reporting(E_ERROR); // stop warning from showing when the lookup cities is chosen 
                          // resulting in the $_GET array for that being undefined

header('Access-Control-Allow-Origin: *');
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

//$stmt = $conn->query("SELECT * FROM countries");

$country = $_GET['country'];
$lookup = $_GET['lookup'];

if ($lookup !== "cities"){
  // ensures that a country is received, shows an error if not (validation)
  if(!isset($country)){
    echo nl2br("ERROR: Invalid entry for country queried for! Either the country doesn't exist in this database
    or it was entered incorrectly. Please check your input.\n");
  } else {
    // now filtered (sanitization)
    $stmt = $conn->prepare("SELECT * FROM countries WHERE name LIKE '%$country%'");
    $country = filter_input(INPUT_GET, 'country', FILTER_SANITIZE_STRING);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  // getting the country in the database
  if ($results == false){
    echo "ERROR: No records acquired from the database. Please check your input";
  } else { ?>

  <table>
    <thead>
      <tr>
        <th>Country Name</th>
        <th>Continent</th>
        <th>Independence Year</th>
        <th>Head of State</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($results as $result): ?>
      <tr>
        <td><?= $result['name']; ?></td>
        <td><?= $result['continent']; ?></td>
        <td><?= $result['independence_year']; ?></td>
        <td><?= $result['head_of_state']; ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

<?php } 
} else {
  if(!isset($country)){
      echo nl2br("ERROR: Invalid entry for country queried for! Either the country doesn't exist in this database
      or it was entered incorrectly. Please check your input.\n");
    } else {
      // now filtered (sanitization)
      $stmt = $conn->prepare("SELECT name, code  FROM countries WHERE name LIKE '%$country%'");
      $country = filter_input(INPUT_GET, 'country', FILTER_SANITIZE_STRING);
      $lookup = filter_input(INPUT_GET, 'lookup', FILTER_SANITIZE_STRING);
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // getting the country in the database
    if ($results == false){
      echo "ERROR: No records acquired from the database. Please check your input";
    } else { ?>

    <table>
      <thead>
        <tr>
          <th>Country Name</th>
          <th>Continent</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($results as $result): ?>
        <tr>
          <td><?= $result['name']; ?></td>
          <td><?= $result['code']; ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

<?php }  }?>