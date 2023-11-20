<?php
session_start();
// database connection 
require_once('includes/db-connection.php');

// write SQL query as string
// to retrieve single row data from joining to tables
$sql = "SELECT * FROM posts JOIN categories ON posts.categoryId = categories.id WHERE posts.postId = 1";

// Execute the query
$result = $conn->query($sql);

// fetch/catch a single row from database/ from $result
$row = $result->fetch_assoc();

$categoryNameS = $row['categoryName'];
$postTitleS = $row['postTitle'];
$postDetailsS = $row['postDetails'];
$target_fileS = $row['postImage'];




// write SQL query as string
// to retrieve multiple row data from joining to tables
$sql = "SELECT * FROM posts JOIN categories ON posts.categoryId = categories.id";
// Execute the query
$results = $conn->query($sql);
// fetch/catch all data in to categories variable 
$allRows = $results->fetch_all(MYSQLI_ASSOC);

?>



<!doctype html>
<html lang="en" class="h-100" data-bs-theme="auto">

<!-- head-element  -->
<?php include 'partials/head-element.php' ?>

<title>Home | PHP Blog</title>

<body class="d-flex flex-column h-100">

  <!-- color mode  -->
  <?php include 'partials/color-mode.php' ?>



  <!-- header section  -->
  <?php include 'partials/header.php' ?>



  <!-- content section  -->
  <main class="container-fluid px-0">

    <div class="card container px-0 mb-5">
      <div class="row g-0">
        <div class="col-md-8">
          <div class="card-body">
            <strong class="d-inline-block mb-2 fs-4 text-success-emphasis"><?= $categoryNameS ?></strong>
            <h1 class="display-4 fst-italic"><?= $postTitleS ?></h1>
            <p class="lead my-3"><?= $postDetailsS ?></p>
            <p class="lead mb-0"><a href="post-details.php" class="text-body-emphasis fw-bold">Continue reading...</a></p>
          </div>
        </div>
        <div class="col-md-4 overflow-hidden">
          <img src="<?= $target_fileS ?>" class="img-fluid rounded-start" alt="...">
        </div>
      </div>
    </div>


    <div class="container">
      <div class="row mb-2">

        <!-- print received data from database table categories -->
        <?php foreach ($allRows as $singleRow) : ?>
          <div class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
              <div class="col-8 p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-primary-emphasis"><?= $singleRow["categoryName"] ?></strong>
                <h3 class="mb-0"><?= $singleRow["postTitle"] ?></h3>
                <div class="mb-1 text-body-secondary">Nov 12</div>
                <p class="card-text mb-auto text-truncate"><?= $singleRow["postDetails"] ?></p>
                <a href="post-details.php?postId=<?= $singleRow['postId'] ?>" class="icon-link gap-1 icon-link-hover stretched-link">
                  Continue reading
                  <span class="d-none"></span>
                </a>
              </div>
              <div class="col-4 d-none d-lg-block">
                <img src="<?= $singleRow["postImage"] ?>" class=" bd-placeholder-img" alt="..." width="250" height="200">
              </div>
            </div>
          </div>
          <!-- loop end  -->
        <?php endforeach; ?>

      </div>
    </div>
  </main>



  <!-- footer section  -->
  <?php include 'partials/footer.php' ?>


</body>

</html>