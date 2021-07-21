<?php
  include "connect.php";

  $sql = "SELECT * FROM transactions";
  $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Sparks Bank</title>


  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

  <!-- W3Schools -->
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <!-- CSS -->
  <link href="style.css?v=<?php echo time(); ?>" type="text/css" rel="stylesheet" />

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">

  <!-- Icons -->
  <script src="https://kit.fontawesome.com/67ab68277d.js" crossorigin="anonymous"></script>

</head>

<body>

  <!-- navigation bar -->
  <nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">SPARKS BANK</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="money_transfer.php">Money Transfer</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="transactions.php">Transaction Record</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://www.thesparksfoundationsingapore.org/">About Us</a>
          </li>
            </ul>
      </div>
    </div>
    <a class="navbar-brand socialicons" href="#"><i class="fab fa-facebook"></i>&nbsp&nbsp<i class="fab fa-instagram">&nbsp&nbsp</i><i class="fab fa-twitter"></i>&nbsp&nbsp<i class="fab fa-linkedin-in"></i></a>
  </nav>

  <!-- transactions body -->
  <div class="transfer w3-animate-opacity">
    <div class="transferbody">
      <!-- table -->
      <table class="table table-dark table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">SENDER</th>
            <th scope="col">RECIPIENT</th>
            <th scope="col">AMOUNT</th>
            <th scope="col">TIMESTAMP</th>
          </tr>
        </thead>
        <tbody>
          <?php while($row = $result->fetch_assoc()) { ?>
          <tr>
            <th scope="row"><?php echo $row["t_id"]; ?></th>
            <td><?php echo $row["t_sender"]; ?></td>
            <td><?php echo $row["t_receiver"]; ?></td>
            <td>Rs. <?php echo $row["t_amount"]; ?></td>
            <td><?php echo $row["t_time"]; ?></td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- footer -->
  <div class="footer">
    <p class="copyright">Kshithi Hegde © 2021</p>
  </div>

</body>
