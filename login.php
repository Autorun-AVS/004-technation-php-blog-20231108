<?php
session_start();
// database connection 
require_once('includes/db-connection.php');

if (isset($_POST['signIn'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
  $result = $conn->query($sql);

  if ($result->num_rows == 1) {
    // fetch/catch row from database/from $result
    $row = $result->fetch_assoc();
    // set id name into $_SESSION variable 'id' base on-> email and password
    $_SESSION['id'] = $row['id'];
    // set image path into $_SESSION variable 'img' base on-> email and password
    $_SESSION['img'] = $row['image'];

    // Redirect to dashboard or home page
    header('Location: index.php');
  } else {
    echo "Invalid username or password";
  }
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">

<!-- head-element  -->
<?php include 'partials/head-element.php' ?>

<title>Login | PHP Blog</title>

<body class="d-flex align-items-center py-4 bg-body-tertiary">

  <!-- color mode  -->
  <?php include 'partials/color-mode.php' ?>


  <!-- content section  -->
  <main class="form-signin w-100 m-auto">
    <form method="post">
      <a href="index.php" class="d-flex align-items-center mb-2 mb-lg-0 ">
        <img class="mb-4" src="assets/brand/Technaiton-dark.svg" alt="">
      </a>
      <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

      <div class="form-floating">
        <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email">
        <label for="email">Email address</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
        <label for="password">Password</label>
      </div>

      <div class="text-end my-3">
        Don't have an account? <a href="register.php">Signup</a>
      </div>
      <button class="btn btn-primary w-100 py-2" type="submit" name="signIn">Sign in</button>
      <p class="mt-5 mb-3 text-body-secondary">&copy; 2022–2023</p>
    </form>
  </main>

</body>

</html>