<?php
session_start();

// database connection 
require_once('includes/db-connection.php');

// write SQL query as string to retrieve data
$sql = "SELECT * FROM categories";
// Execute the query
$result = $conn->query($sql);

// get all data in to categories table variable 
$categories = $result->fetch_all(MYSQLI_ASSOC);



if (isset($_POST['createPost'])) {

  // ------- image upload section start -------
  // Check if the form was submitted with a file upload
  if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
    // Specify the directory to save the uploaded file
    $target_dir = "uploads/";

    // Generate a unique name for the file
    $target_file = $target_dir . uniqid() . '_' . basename($_FILES["image"]["name"]);

    // Move the uploaded file to the specified directory
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
      echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  } else {
    echo "No file was uploaded.";
  }
  // ------- image upload section end -------


  // Retrieve user input from form
  $target_file;
  $postTitle = $_POST["postTitle"];
  $postDetails = $_POST["postDetails"];
  $userId = $_SESSION["id"];
  $categoryId = $_POST["categoryId"];


  // SQL INSERT statement
  $sql = "INSERT INTO posts (postImage, postTitle, postDetails, userId, categoryId) VALUES ('$target_file', '$postTitle', '$postDetails' , '$userId', '$categoryId')";


  if ($conn->query($sql) === TRUE) {
    header('Location: index.php');
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}


// Close the database connection
$conn->close();

?>



<!doctype html>
<html lang="en" class="h-100" data-bs-theme="auto">

<!-- head-element  -->
<?php include 'partials/head-element.php' ?>

<title>Create a Post | PHP Blog</title>

<body class="d-flex flex-column h-100">

  <!-- color mode  -->
  <?php include 'partials/color-mode.php' ?>



  <!-- header section  -->
  <?php include 'partials/header.php' ?>



  <!-- content section  -->

  <div class="container ">
    <div class="row d-flex justify-content-center mb-4">
      <div class="col-md-6 ">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Create a post</h5>
            <form method="post" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="postImage" class="form-label">Upload Image:</label>
                <input class="form-control form-control-sm" id="postImage" type="file" name="image">
              </div>


              <div class="mb-3">
                <label for="category" class="form-label">Select Category</label>
                <select class="form-select" aria-label="Default select example" name="categoryId">


                  <!-- print received data from database table categories -->
                  <?php foreach ($categories as $category) : ?>
                    <!-- loop start  -->

                    <option value="<?= $category["id"] ?>"><?= $category["categoryName"] ?></option>

                    <!-- loop end  -->
                  <?php endforeach; ?>


                </select>
              </div>

              <div class="mb-3">
                <label for="postTitle" class="form-label">Title</label>
                <input type="text" class="form-control" id="postTitle" placeholder="Write Title" name="postTitle">
              </div>
              <div class="mb-3">
                <label for="postDetails" class="form-label">Post Details</label>
                <textarea class="form-control" id="postDetails" rows="4" placeholder="Write Details" name="postDetails"></textarea>
              </div>

              <button type="submit" class="btn btn-primary" name="createPost">Create Post</button>
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