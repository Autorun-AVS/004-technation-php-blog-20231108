<?php
// database connection 
require_once('includes/db-connect.php');

if (isset($_POST['signIn'])) {
  $firstName = $_POST["firstName"];
  $lastName = $_POST["lastName"];
  $email = $_POST["email"];
  $password = $_POST["password"];


  // TODO validation , password hashing, user alert massage


  // insert in to database 
  // SQL INSERT statement
  $sql = "INSERT INTO users (firstName, lastName, email, password) VALUES ('$firstName', '$lastName', '$email' , '$password')";

  if ($conn->query($sql) === TRUE) {
    header("Location: login.php");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // Close the database connection
  $conn->close();
}

?>


<!DOCTYPE html>
<html lang="en">


<!-- head-element  -->
<?php include 'partials/head-element.php' ?>

<title>Registration | PHP Blog</title>

<body class="d-flex align-items-center py-4 bg-body-tertiary">

  <!-- color mode  -->
  <?php include 'partials/color-mode.php' ?>


  <!-- content section  -->
  <main class="form-signup w-100 m-auto">
    <form method="post">
      <a href="index.php" class="d-flex align-items-center mb-2 mb-lg-0 ">
        <img class="mb-4" src="assets/brand/Technaiton-dark.svg" alt="">
      </a>
      <h1 class="h3 mb-3 fw-normal">Register Here</h1>


      <div class="form-floating">
        <input type="text" class="form-control" id="firstName" placeholder="First name" name="firstName" required>
        <label for="firstName">First Name</label>
      </div>
      <div class="form-floating">
        <input type="text" class="form-control" id="lastName" placeholder="Last name" name="lastName" required>
        <label for="lastName">Last Name</label>
      </div>
      <div class="form-floating">
        <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email" required>
        <label for="email">Email address</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
        <label for="password">Password</label>
      </div>


      <div class="text-end my-3">
        Already register? <a href="login.php">Login</a>
      </div>
      <button class="btn btn-primary w-100 py-2" type="submit" name="signIn">Sign in</button>


      <p class="mt-5 mb-3 text-center text-body-secondary">&copy; 2022–2023</p>
    </form>
  </main>

</body>

</html>