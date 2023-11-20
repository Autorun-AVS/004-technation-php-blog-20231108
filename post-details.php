<?php
session_start();
// database connection 
require_once('includes/db-connection.php');

// catch user id from session variable
$postId = $_GET["postId"];

// to retrieve single row data from joining to tables
$sql = "SELECT * FROM posts JOIN categories ON posts.categoryId = categories.id WHERE posts.postId = $postId";

// Execute the query
$result = $conn->query($sql);

// fetch/catch a single row from database/ from $result
$row = $result->fetch_assoc();

$categoryNameS = $row["categoryName"];
$postTitleS = $row["postTitle"];
$postDetailsS = $row["postDetails"];
$postImage = $row["postImage"];




// if user submit the form correctly  
if (isset($_POST['submitComment'])) {

  // catch user id from session variable
  $userId = $_SESSION['id'];
  // receive data from user form

  $comment = $_POST["comment"];

  $sql = "INSERT INTO comments (userId, postId, comment) VALUES ('$userId', '$postId', '$comment')";

  // if query success, then Redirect to login.php
  if ($conn->query($sql) === TRUE) {
    // Redirect to post-detail.php with postId that's hold postId from index.php page
    header("Location: post-details.php?postId=" . $postId);
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}




// write SQL query as string
// to retrieve multiple row data from joining to tables
$sql = "SELECT * FROM comments JOIN users ON comments.userId = users.id WHERE postId = $postId";

// Execute the query
$results = $conn->query($sql);
// fetch/catch all data in to categories variable 
$allRows = $results->fetch_all(MYSQLI_ASSOC);



?>


<!doctype html>
<html lang="en" class="h-100" data-bs-theme="auto">

<!-- head-element  -->
<?php include 'partials/head-element.php' ?>

<title>Post Details | PHP Blog</title>

<body class="d-flex flex-column h-100">

  <!-- color mode  -->
  <?php include 'partials/color-mode.php' ?>



  <!-- header section  -->
  <?php include 'partials/header.php' ?>



  <!-- content section  -->
  <main class="container-fluid px-0">
    <div class="container">
      <div class="card mb-3">
        <img src="<?= $postImage ?>" class="card-img-top" alt="...">
        <div class="card-body">
          <strong class="d-inline-block mb-2 text-primary-emphasis"><?= $categoryNameS ?></strong>
          <h3 class="mb-0"><?= $postTitleS ?></h3>
          <div class="mb-1 text-body-secondary">Nov 12</div>
          <p class="card-text mb-auto"><?= $postDetailsS ?></p>
        </div>
      </div>
    </div>
  </main>



  <section class="container my-3">
    <!-- post a comment  -->
    <form class="clearfix" method="post">
      <div class="mb-3">
        <label for="comment" class="form-label fw-bold">Write Comment</label>
        <textarea class="form-control bg-light" id="comment" rows="3" name="comment"></textarea>
      </div>

      <button type="submit" class="btn btn-primary float-end" name="submitComment">comment</button>
    </form>


    <!-- comment list  -->
    <div class="my-3 p-3 bg-body rounded shadow-sm ">
      <h6 class="border-bottom pb-2 mb-0">Comments</h6>

      <!-- print received data from database table comments -->
      <?php foreach ($allRows as $singleRow) : ?>
        <div class="d-flex text-body-secondary pt-3">
          <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false">
            <title>Placeholder</title>
            <rect width="100%" height="100%" fill="#007bff" /><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text>
          </svg>
          <p class="pb-3 mb-0 small lh-sm border-bottom">
            <strong class="d-block text-gray-dark">@<?= $singleRow['firstName'] ?></strong>
            <?= $singleRow['comment'] ?>
        </div>
        <!-- loop end  -->
      <?php endforeach; ?>

      <small class="d-block text-end mt-3">
        <a href="#">All comments</a>
      </small>
    </div>

  </section>



  <!-- footer section  -->
  <?php include 'partials/footer.php' ?>


</body>

</html>