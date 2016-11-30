<!DOCTYPE HTML>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Francois+One|Open+Sans" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="main.css"/>
  <script src="script.js"></script>
</head>
<body>

<?php

$submitted = false;

$firstname = $lastname = $email = $address = $phone = $city = $zipcode = $state = $uscitizen = $gender = $year = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if(empty($_POST["firstname"])) {
    $submitted = false;
  }
  else {
    $submitted = true;

    // var_dump($_POST);

    $firstname = test_input($_POST["firstname"]);
    $lastname = test_input($_POST["lastname"]);
    $email = test_input($_POST["email"]);
    $phone = test_input($_POST["phone"]);
    $address = test_input($_POST["address"]);
    $city = test_input($_POST["city"]);
    $zipcode = test_input($_POST["zipcode"]);
    $state = test_input($_POST["state"]);
    $uscitizen = test_input($_POST["uscitizen"]);
    $gender = test_input($_POST["gender"]);
    $year = test_input($_POST["year"]);

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "registration_data";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if($conn->connect_error) {
      die("Connection failed: ".$conn->connect_error);
    }

    $sql = "INSERT INTO RegistrationData (firstname, lastname, email, phone) VALUES ('$firstname', '$lastname', '$email', '$phone')";

    if($conn->query($sql) == TRUE) {
      // echo $sql;
      echo "created new record";
    }

    $conn->close();
  }
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {

}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<div class="row">
   <div class="col-md-8 col-md-offset-2 main-column">

<?php if(!$submitted) { ?>
     <div id="form-area">

       <div class="page-header">
         <h1>Form</h1>
       </div>

       <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

          <div class="row">
            <div class="col-sm-3">

              <p>First Name: </p>
              <p>Last Name: </p>
              <p>Email: </p>
              <p>Phone: </p>
              <p>Address: </p>
              <p>City: </p>
              <p>Zip Code: </p>
              <p>State: </p>
              <p></p>
              <p>Gender: </p>
              <p>Year in School: </p>
            </div>

            <div class="col-sm-9">

              <input type="text" name="firstname"><br>
              <input type="text" name="lastname"><br>
              <input type="text" name="email"><br>
              <input type="text" name="phone"><br>
              <input type="text" name="address"><br>
              <input type="text" name="city"><br>
              <input type="text" name="zipcode"><br>

              <select name="state">
              	<option value="AL">Alabama</option>
              	<option value="AK">Alaska</option>
              	<option value="AZ">Arizona</option>
              	<option value="AR">Arkansas</option>
              	<option value="CA">California</option>
              	<option value="CO">Colorado</option>
              	<option value="CT">Connecticut</option>
              	<option value="DE">Delaware</option>
              	<option value="DC">District Of Columbia</option>
              	<option value="FL">Florida</option>
              	<option value="GA">Georgia</option>
              	<option value="HI">Hawaii</option>
              	<option value="ID">Idaho</option>
              	<option value="IL">Illinois</option>
              	<option value="IN">Indiana</option>
              	<option value="IA">Iowa</option>
              	<option value="KS">Kansas</option>
              	<option value="KY">Kentucky</option>
              	<option value="LA">Louisiana</option>
              	<option value="ME">Maine</option>
              	<option value="MD">Maryland</option>
              	<option value="MA">Massachusetts</option>
              	<option value="MI">Michigan</option>
              	<option value="MN">Minnesota</option>
              	<option value="MS">Mississippi</option>
              	<option value="MO">Missouri</option>
              	<option value="MT">Montana</option>
              	<option value="NE">Nebraska</option>
              	<option value="NV">Nevada</option>
              	<option value="NH">New Hampshire</option>
              	<option value="NJ">New Jersey</option>
              	<option value="NM">New Mexico</option>
              	<option value="NY">New York</option>
              	<option value="NC">North Carolina</option>
              	<option value="ND">North Dakota</option>
              	<option value="OH">Ohio</option>
              	<option value="OK">Oklahoma</option>
              	<option value="OR">Oregon</option>
              	<option value="PA">Pennsylvania</option>
              	<option value="RI">Rhode Island</option>
              	<option value="SC">South Carolina</option>
              	<option value="SD">South Dakota</option>
              	<option value="TN">Tennessee</option>
              	<option value="TX">Texas</option>
              	<option value="UT">Utah</option>
              	<option value="VT">Vermont</option>
              	<option value="VA">Virginia</option>
              	<option value="WA">Washington</option>
              	<option value="WV">West Virginia</option>
              	<option value="WI">Wisconsin</option>
              	<option value="WY">Wyoming</option>
              </select>
              <br>

              <input type="checkbox" name="uscitizen" value="Yes"> I am a US Citizen<br>

              <input type="radio" name="gender" value="female">Female
              <input type="radio" name="gender" value="male">Male<br>

              <input type="radio" name="year" value="freshman"> Freshman
              <input type="radio" name="year" value="sophomore"> Sophomore
              <input type="radio" name="year" value="junior"> Junior
              <input type="radio" name="year" value="senior"> Senior
            </div>
          </div>
          <br>
          <input type="submit" name="submit" value="Submit" id="submit-button">

        </form>
      </div>
<?php } ?>


    <div id="user-input">
<?php
if($submitted) {

  echo "<h1>Your Input:</h1><hr>";
  echo "<p id='firstname'>First Name: ".$firstname."</p>";
  echo "<p>Last Name: ".$lastname."</p>";
  echo "<p>Email: ".$email."</p>";
  echo "<p>Phone: ".$phone."</p>";
  echo "<p>Address: ".$address."</p>";
  echo "<p>City: ".$city."</p>";
  echo "<p>Zip Code: ".$zipcode."</p>";
  echo "<p>State: ".$state."</p>";
  echo "<p>First Name: ".$firstname."</p>";
  echo "<p>First Name: ".$firstname."</p>";

  if($uscitizen == "Yes") echo "<p>US Citizen: Yes</p>";
  else echo "<p>US Citizen: No</p>";

  echo "<p>Gender: ".$gender."</p>";
  echo "<p>Year in School: ".$year."</p>";
}
?>
      <!-- <button onclick="showForm()">Fill in another form</button> -->
    </div>

  </div>
</div>

</body>
</html>
