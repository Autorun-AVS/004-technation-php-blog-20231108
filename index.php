<!doctype html>
<html lang="en" class="h-100" data-bs-theme="auto">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home | PHP Blog</title>

  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/bootstrap.color.mode.css">

  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <!-- color mode js  -->
  <script src="assets/js/color-modes.js"></script>

</head>

<body class="d-flex flex-column h-100">

  <!-- color mode  -->
  <?php include 'partials/color-mode.php' ?>



  <!-- header section  -->
  <?php include 'partials/header.php' ?>



  <!-- content section  -->
  <main class="container-fluid px-0">
    <div class="bg-body-secondary">
      <div class="p-4 p-md-5 mb-4 text-body-emphasis container">
        <div class="col-lg-6 px-0 bg-body-secondary">
          <h1 class="display-4 fst-italic">Title of a longer featured blog post</h1>
          <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
          <p class="lead mb-0"><a href="page-details.php" class="text-body-emphasis fw-bold">Continue reading...</a></p>
        </div>
      </div>
    </div>


    <div class="container">
      <div class="row mb-2">
        <div class="col-md-6">
          <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
              <strong class="d-inline-block mb-2 text-primary-emphasis">World</strong>
              <h3 class="mb-0">Featured post</h3>
              <div class="mb-1 text-body-secondary">Nov 12</div>
              <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="icon-link gap-1 icon-link-hover stretched-link">
                Continue reading
                <svg class="bi">
                  <use xlink:href="#chevron-right" />
                </svg>
              </a>
            </div>
            <div class="col-auto d-none d-lg-block">
              <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
              </svg>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
              <strong class="d-inline-block mb-2 text-success-emphasis">Design</strong>
              <h3 class="mb-0">Post title</h3>
              <div class="mb-1 text-body-secondary">Nov 11</div>
              <p class="mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="icon-link gap-1 icon-link-hover stretched-link">
                Continue reading
                <svg class="bi">
                  <use xlink:href="#chevron-right" />
                </svg>
              </a>
            </div>
            <div class="col-auto d-none d-lg-block">
              <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
              </svg>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>


  
  <!-- footer section  -->
  <?php include 'partials/footer.php' ?>


</body>

</html>