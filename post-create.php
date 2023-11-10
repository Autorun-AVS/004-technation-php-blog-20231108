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
            <form>
              <div class="mb-3">
                <label for="postImage" class="form-label">Upload Image:</label>
                <input class="form-control form-control-sm" id="postImage" type="file">
              </div>

              <div class="mb-3">
                <label for="postTitle" class="form-label">Title</label>
                <input type="text" class="form-control" id="postTitle" placeholder="Write Title">
              </div>
              <div class="mb-3">
                <label for="postDetails" class="form-label">Post Details</label>
                <textarea class="form-control" id="postDetails" rows="4" placeholder="Write Details"></textarea>
              </div>

              <button type="submit" class="btn btn-primary">Create Post</button>
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