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
              <img src="assets/images/blake-wisz-Xn5FbEM9564-unsplash.jpg" class="img-fluid rounded-start p-4" alt="..." style="max-height: 280px;">
            </div>
            <div class="col-md-6">
              <div class="card-body">
                <h5 class="card-title">Profile</h5>
                <table class="table">
                  <tbody>
                    <tr>
                      <th scope="row">First Name</th>
                      <td>Mark</td>
                    </tr>
                    <tr>
                      <th scope="row">Last Name</th>
                      <td>Jacob</td>
                    </tr>
                    <tr>
                      <th scope="row">Email</th>
                      <td>email@gmail.com</td>
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
            <form>
              <div class="mb-3">
                <label for="profileImage" class="form-label">Update Image:</label>
                <input class="form-control form-control-sm" id="profileImage" type="file">
              </div>

              <div class="mb-3">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstName" placeholder="First Name">
              </div>
              <div class="mb-3">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastName" placeholder="Last Name">
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" placeholder="name@example.com">
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password">
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
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