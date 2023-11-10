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
    <form>
      <a href="index.php" class="d-flex align-items-center mb-2 mb-lg-0 ">
        <img class="mb-4" src="assets/brand/Technaiton-dark.svg" alt="">
      </a>
      <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

      <div class="form-floating">
        <input type="email" class="form-control" id="email" placeholder="name@example.com">
        <label for="email">Email address</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="password" placeholder="Password">
        <label for="password">Password</label>
      </div>

      <div class="text-end my-3">
        Don't have an account? <a href="register.php">Signup</a>
      </div>
      <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-body-secondary">&copy; 2022–2023</p>
    </form>
  </main>

</body>

</html>