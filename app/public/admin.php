<?php
session_start();
if (isset($_SESSION["current_id"])) {
  if ($_SESSION["current_id"] != "20660858") {
    header("Location: ./");
  }
} else {
  header("Location: ./");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Welcome | Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.1/b-2.3.3/b-html5-2.3.3/fh-3.3.1/datatables.min.css" />

  <link rel="stylesheet" href="./lib/css/main.css" />
</head>

<body>
  <div class="container">
    <div class="mt-5">
      <div class="row border-bottom border-secondary">
        <div class="col-lg-10">
          <h2 class="text-muted">Admin Tools</h2>
        </div>
        <div class="col-lg-2">
          <button class="btn btn-danger float-end" id="btnLogout">
            <i class="fa-solid fa-right-from-bracket"></i> Logout
          </button>
        </div>
      </div>

      <div class="row">
        <div class="row">
          <div class="col-lg-11">
            <h4 class="mt-3 text-muted">Student List</h4>
          </div>
          <div class="col-lg-1">
            <button class="btn btn-warning mt-2">Disabled</button>
          </div>
        </div>
        <table class="table table-bordered" id="adminTbl">
          <thead>
            <th>#</th>
            <th>ID Number</th>
            <th>Section</th>
            <th>Time-in</th>
            <th>Time-out</th>
            <th>Action</th>
          </thead>
          <tbody id="adminTbody">

          </tbody>
        </table>
      </div>
      <div class="row text-center py-2 mt-5">
        <footer>
          Copyright &copy;
          <script>
            document.write(new Date().getFullYear());
          </script>
          | CPC App
        </footer>
        <footer>All Rights Reserved.</footer>
      </div>
    </div>
  </div>

  <!-- Modal Update -->
  <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content bg-dark bg-gradient text-light">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">
            Update Information
          </h1>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">
            <i class="fa-solid fa-xmark"></i>
          </button>
        </div>
        <div class="modal-body px-4">
          <form class="row g-3">
            <div class="col-md-12">
              <label for="idnumber" class="form-label">ID Number</label>
              <input type="number" class="form-control" id="idnumber" />
            </div>
            <div class="col-12">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" id="address" />
            </div>
            <div class="col-12">
              <label for="inputAddress2" class="form-label">Email Address</label>
              <input type="email" class="form-control" id="inputAddress2" />
            </div>
            <div class="col-md-6">
              <label for="inputCity" class="form-label">Contact Number</label>
              <input type="text" class="form-control" id="inputCity" />
            </div>
            <div class="col-md-6">
              <label for="inputState" class="form-label">Section</label>
              <select id="inputState" class="form-select">
                <option selected>Choose...</option>
                <option>BSIT-4A</option>
                <option>BSIT-4B</option>
                <option>BSIT-4C</option>
                <option>BSIT-4D</option>
              </select>
            </div>

            <div class="col-12 mt-4">
              <button type="submit" class="btn btn-success w-100">
                Update
              </button>
            </div>
          </form>
        </div>
        <div class="d-color">
          <div class="text-center mt-3 mb-4 f1">
            <footer>
              Copyright &copy;
              <script>
                document.write(new Date().getFullYear());
              </script>
              | CPC App
            </footer>
            <footer>All Rights Reserved.</footer>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js" integrity="sha512-rpLlll167T5LJHwp0waJCh3ZRf7pO6IT1+LZOhAyP6phAirwchClbTZV3iqL3BMrVxIYRbzGTpli4rfxsCK6Vw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="./lib/js/jquery.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.13.1/b-2.3.3/b-html5-2.3.3/fh-3.3.1/datatables.min.js"></script>
<script src="./lib/js/admin.js"></script>

</html>