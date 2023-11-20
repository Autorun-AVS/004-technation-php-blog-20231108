<?php
session_start();
// database connection 
require_once('includes/db-connection.php');

// catch user id from session variable
$userId = $_SESSION['id'];
// write SQL query as string to retrieve data
$sql = "SELECT * FROM users WHERE id = '$userId'";
// Execute the query
$result = $conn->query($sql);

// fetch/catch a single row from database/ from $result
$row = $result->fetch_assoc();

// assign collected data form database, into separate variables
$firstNameS = $row["firstName"];
$lastNameS = $row["lastName"];
$emailS = $row["email"];
$passwordS = $row["password"];
$target_fileS = "";
if (empty($row["image"])) {
  $target_fileS = "assets/images/no_image.png";
} else {
  $target_fileS =  $row["image"];
}



if (isset($_POST["saveChange"])) {

  // ------- image upload section start -------
  // Check if the form was submitted with a file upload
  if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
    // Specify the directory to save the uploaded file
    $target_dir = "uploads/profile/";

    // Generate a unique name for the file
    $target_file = $target_dir . uniqid() . '_' . basename($_FILES["image"]["name"]);

    // Move the uploaded file to the specified directory
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
      echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";
      // delete old image 
      unlink($target_fileS);
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  } else {
    echo "No file was uploaded.";
  }
  // ------- image upload section end -------



  // Retrieve user new input data using form
  // $target_file; 
  $firstName = $_POST["firstName"];
  $lastName = $_POST["lastName"];
  $userId = $_SESSION["id"];
  $email = $_POST["email"];
  $password = $_POST["password"];

  
  // SQL INSERT statement
  $sql = "UPDATE users SET firstName = '$firstName', lastName = '$lastName', email = '$email', password = '$password', image = '$target_file' WHERE id = $userId";

  if ($conn->query($sql) === TRUE) {
    header('Location: profile.php');
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }


}
?>




<!doctype html>
<html lang="en" class="h-100" data-bs-theme="auto">

<!-- head-element  -->
<?php include 'partials/head-element.php' ?>

<title>Profile | PHP Blog</title>

<body class="d-flex flex-column h-100">

  <!-- color mode  -->
  <?php include 'partials/color-mode.php' ?>



  <!-- header section  -->
  <?php include 'partials/header.php' ?>



  <!-- content section  -->
  <div class="container">
    <div class="row">
      <div class="d-flex justify-content-center">
        <div class="card mb-3">
          <div class="row g-0">
            <div class="col-md-6 text-center">
              <!-- uploaded profile image form database , $target_fileS -->
              <img src="<?= $target_fileS ?>" class="img-fluid rounded-start p-4" alt="..." style="max-height: 280px;">
            </div>
            <div class="col-md-6">
              <div class="card-body">
                <h5 class="card-title">Profile</h5>
                <table class="table">
                  <tbody>
                    <tr>
                      <th scope="row">First Name</th>
                      <td><?= $firstNameS ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Last Name</th>
                      <td><?= $lastNameS ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Email</th>
                      <td><?= $emailS ?></td>
                    </tr>
                  </tbody>
                </table>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit Profile</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Profile</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="post" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="profileImage" class="form-label">Update Image:</label>
                <input class="form-control form-control-sm" id="profileImage" type="file" name="image" value="<?= $target_fileS ?>">
              </div>

              <div class="mb-3">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstName" placeholder="First Name" name="firstName" value="<?= $firstNameS ?>">
              </div>
              <div class="mb-3">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastName" placeholder="Last Name" name="lastName" value="<?= $lastNameS ?>">
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email" value="<?= $emailS ?>">
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password" name="password" value="<?= $passwordS ?>">
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="saveChange">Save changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>


  </div>


  <!-- footer section  -->
  <?php include 'partials/footer.php' ?>


</body>

</html>