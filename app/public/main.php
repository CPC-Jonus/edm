<?php
session_start();
if (!isset($_SESSION["current_id"])) {
  header("Location: ./");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CPC | Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js" integrity="sha512-rpLlll167T5LJHwp0waJCh3ZRf7pO6IT1+LZOhAyP6phAirwchClbTZV3iqL3BMrVxIYRbzGTpli4rfxsCK6Vw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="./lib/css/main.css" />
</head>

<body>
  <div class="container-fluid m-0 p-0">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top ps-5 pe-5">
      <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="#"><i class="fa-solid fa-gear"></i> CPC-APP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse f1" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#page-1">Resources</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Other
              </a>
              <ul class="dropdown-menu f1">
                <li>
                  <a class="dropdown-item" href="#">Announcements</a>
                </li>
                <li><a class="dropdown-item" href="#">Top Projects</a></li>
                <li><a class="dropdown-item" href="#">About-Us</a></li>
                <li>
                  <hr class="dropdown-divider" />
                </li>
                <li>
                  <a class="dropdown-item" href="#">Comments & Suggestion</a>
                </li>
              </ul>
            </li>
          </ul>
          <button class="btn btn-primary ms-3 rounded-pill f1 py-2 px-4 fw-bold" data-bs-toggle="modal" data-bs-target="#loginmodal">
            USER
          </button>
        </div>
      </div>
    </nav>
    <div class="row p1">
      <div class="hero-image">
        <div class="hero-text">
          <div class="main-bg-color rounded pb-3 px-3">
            <h1 class="m-color pt-3">Daily Attendance</h1>
            <hr class="border-bottom border-secondary mt-0" />
            <h5 class="float-start m-color">
              ID Number : <span id="idnum"></span>
            </h5>

            <table class="m-color table table-bordered">
              <thead>
                <th>Description</th>
                <th>Timestamp</th>
              </thead>
              <tbody>
                <tr>
                  <td>Time-in</td>
                  <td id="timein"></td>
                </tr>
                <tr>
                  <td>Time-out</td>
                  <td id="timeout"></td>
                </tr>
              </tbody>
            </table>
            <button class="btn btn-primary rounded-pill px-5 py-3" id="time">
              Timein
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="bg-1" id="page-1">
      <div class="container p1 pt-5">
        <div class="row color-1 mt-5">
          <div class="col-lg-9">
            <div>
              <h4 class="underline-1">Frontend Frameworks/Library</h4>
              <ul>
                <li>
                  <a href="https://getbootstrap.com/" target="_blank">Bootstrap</a>
                  <p class="font-sm-1">
                    Powerful, extensible, and feature-packed frontend toolkit.
                    Build and customize with Sass, utilize prebuilt grid
                    system and components, and bring projects to life with
                    powerful JavaScript
                    plugins.(from:https://getbootstrap.com/)
                  </p>
                </li>
                <li>
                  <a href="https://jquery.com/" target="_blank">Jquery</a>
                  <p class="font-sm-1">
                    jQuery is a fast, small, and feature-rich JavaScript
                    library. It makes things like HTML document traversal and
                    manipulation, event handling, animation, and Ajax much
                    simpler with an easy-to-use API that works across a
                    multitude of browsers.(from:https://jquery.com/)
                  </p>
                </li>
                <li>
                  <a href="https://vuejs.org/" target="_blank">VueJS</a>
                  <p class="font-sm-1">
                    An approachable, performant and versatile framework for
                    building web user interfaces.(from:https://vuejs.org/)
                  </p>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3">
            <div>
              <h4 class="underline-1">Frontend Resources</h4>
              <ul>
                <li>
                  <a href="https://www.w3schools.com/html/" target="_blank">HTML</a>
                </li>
                <li>
                  <a href="https://www.w3schools.com/css/" target="_blank">CSS</a>
                </li>
                <li>
                  <a href="https://www.w3schools.com/js/" target="_blank">Javascript</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row color-1 mt-5">
          <div class="col-lg-9">
            <div>
              <h4 class="underline-1">Backend Framework</h4>
              <ul>
                <li>
                  <a href="https://laravel.com/" target="_blank">Laravel</a>
                  <p class="font-sm-1">
                    Laravel is a web application framework with expressive,
                    elegant syntax. We’ve already laid the foundation —
                    freeing you to create without sweating the small
                    things.(from:https://laravel.com/)
                  </p>
                </li>
                <li>
                  <a href="https://nodejs.org/en/" target="_blank">NodeJS</a>
                  <p class="font-sm-1">
                    As an asynchronous event-driven JavaScript runtime,
                    Node.js is designed to build scalable network
                    applications. In the following "hello world" example, many
                    connections can be handled
                    concurrently.(from:https://nodejs.org/en/)
                  </p>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3">
            <div>
              <h4 class="underline-1">Backend Resources</h4>
              <ul>
                <li>
                  <a href="https://www.w3schools.com/php/" target="_blank">PHP</a>
                </li>
                <li>
                  <a href="https://www.w3schools.com/java/" target="_blank">JAVA</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row text-center py-2">
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

  <!-- Modal User -->
  <div class="modal fade" id="loginmodal" tabindex="-1" aria-labelledby="loginmodal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content bg-dark bg-gradient text-light">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">
            User Information
          </h1>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">
            <i class="fa-solid fa-xmark"></i>
          </button>
        </div>
        <div class="modal-body px-4">
          <div class="">
            <div class="row">
              <div class="col-lg-10">
                <span class="ms-0 ps-0"><button class="btn btn-link ms-0 ps-0">
                    Change ID Number
                  </button></span>
                <p class="u-desc">Change your school id number</p>
              </div>
              <div class="col-lg-2">
                <h2 class="mt-2"><i class="fa-solid fa-id-card"></i></h2>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-10">
                <span class="ms-0 ps-0"><button class="btn btn-link ms-0 ps-0">
                    Change Password
                  </button></span>
                <p class="u-desc">Change your current password</p>
              </div>
              <div class="col-lg-2">
                <h2 class="mt-2"><i class="fa-solid fa-lock"></i></h2>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-10">
                <span class="ms-0 ps-0"><button class="btn btn-link ms-0 ps-0" id="logout">
                    Logout
                  </button></span>
                <p class="u-desc">Logoff your current session</p>
              </div>
              <div class="col-lg-2">
                <h2 class="mt-2">
                  <i class="fa-solid fa-right-from-bracket"></i>
                </h2>
              </div>
            </div>
          </div>
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
<script src="./lib/js/jquery.js"></script>
<script src="./lib/js/main.js"></script>

</html>