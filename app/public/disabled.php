<?php
session_start();
if (isset($_SESSION["down"])) {
  if ($_SESSION["down"] != 200) {
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
  <title>CPC-App | Disabled</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js" integrity="sha512-rpLlll167T5LJHwp0waJCh3ZRf7pO6IT1+LZOhAyP6phAirwchClbTZV3iqL3BMrVxIYRbzGTpli4rfxsCK6Vw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <style>
    .checking-1 {
      font-size: 150px;
      color: #34495e;
    }

    .checking-2 {
      margin-top: 20%;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row checking-2">
      <h1 class="text-center checking-1 text-danger">
        <i class="fa-solid fa-circle-exclamation"></i>
      </h1>
      <h1 class="text-center">This Application is Currently Unavailable</h1>
      <p class="text-center"><b>WAIT FOR YOUR INSTRUCTOR TO TURN IT ON</b></p>
      <div class="mt-5">
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

</html>