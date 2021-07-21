<?php
  include "connect.php";

  $sql1 = "SELECT * FROM customers";
  $result1 = $conn->query($sql1);

  $cust_id = $_REQUEST['id'];

  $sql2 = "SELECT * FROM customers WHERE cust_id='".$cust_id."'";
  $result2 = $conn->query($sql2);
  $row2 = $result2->fetch_assoc();

  if(isset($cust_id))
  {
    $cust_name=$row2["cust_name"];
    $cust_email=$row2["cust_email"];
    $cust_balance=$row2["cust_balance"];
    $sql3 = "SELECT * FROM customers WHERE cust_name != '".$cust_name."'";
    $result3 = $conn->query($sql3);
  }

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
            <a class="nav-link active" href="money_transfer.php">Money Transfer</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="transactions.php">Transaction Record</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://www.thesparksfoundationsingapore.org/">About Us</a>
          </li>
            </ul>
      </div>
    </div>
    <a class="navbar-brand socialicons" href="#"><i class="fab fa-facebook"></i>&nbsp&nbsp<i class="fab fa-instagram">&nbsp&nbsp</i><i class="fab fa-twitter"></i>&nbsp&nbsp<i class="fab fa-linkedin-in"></i></a>
  </nav>

  <!-- transafer action -->
  <div class="transferaction w3-animate-opacity">
    <!-- form -->
    <form class="mtaf" method="post" action="">
      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-check"></i>&nbsp&nbsp&nbspSender</span>
        <select class="form-control" name="fromname" required>
          <option value="<?php echo $cust_name ?>" selected><?php echo $cust_name ?></option>
          <?php
            while($row3 = $result3->fetch_assoc()) { ?>
          <option value="<?php echo $row3["cust_name"] ?>"><?php echo $row3["cust_name"] ?></option>
        <?php } ?>
        </select>
      </div>
      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1"><i class="fas fa-wallet"></i>&nbsp&nbsp&nbsp&nbspAmount</span>
        <input type="number" class="form-control" name="amount" min="1" required>
      </div>
      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1"><i class="fas fa-users"></i>&nbsp&nbsp&nbsp&nbspRecipient</span>
        <select class="form-control" name="toname" required>
          <option value="0" disabled selected> </option>
          <?php
            $sql3 = "SELECT * FROM customers WHERE cust_name != '".$cust_name."'";
            $result3 = $conn->query($sql3);
            while($row3 = $result3->fetch_assoc()) { ?>
          <option value="<?php echo $row3["cust_name"] ?>"><?php echo $row3["cust_name"] ?></option>
        <?php } ?>
        </select>
      </div>
      <div class="input-group mb-3">
        <button type="submit" name='submit' class="btn btn-danger btn-lg">Transfer Money</button>
      </div>
      <a href="money_transfer.php" class="goback"><i class="fas fa-long-arrow-alt-left"></i>&nbsp&nbspgo back</a>
    </form>
  </div>

  <!-- footer -->
  <div class="footer">
    <p class="copyright">Kshithi Hegde © 2021</p>
  </div>

<!-- form submit action -->
<?php
  if(isset($_POST['submit'])) {
    $fromname = $_POST["fromname"];
    $amount = $_POST["amount"];
    $toname = $_POST["toname"];
    date_default_timezone_set("Asia/Kolkata");
    $timest = date("d:m:Y h:i:sa");
    if($amount<=$cust_balance) {
      $sql4 = "INSERT INTO transactions (t_sender, t_receiver, t_amount, t_time) VALUES ('$fromname', '$toname', '$amount', '$timest')";
      $result4 = $conn->query($sql4);
      if($result4) {
        $sql5 = "UPDATE customers SET cust_balance = cust_balance - '".$amount."' WHERE cust_name = '".$fromname."'";
        $result5 = $conn->query($sql5);
        $sql6 = "UPDATE customers SET cust_balance = cust_balance + '".$amount."' WHERE cust_name = '".$toname."'";
        $result6 = $conn->query($sql6);
        ?>

        <script type="text/javascript">
        $(window).on('load', function() {
          $('#exampleModal').modal('show');
        });
        </script>

        <!-- successful modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <i class="fas fa-check-circle fa-5x"></i> <br /><br />
                <h1>SUCCESSFUL!</h1>
                <p class="modelbodycontent">
                  Successfully transferred Rs.<?php echo $amount ?> from <?php echo $fromname ?> to <?php echo $toname ?>.
                </p>
              </div>
            </div>
          </div>
        </div>

      <?php } }
      else {
      ?>

      <script type="text/javascript">
      $(window).on('load', function() {
        $('#exampleModal1').modal('show');
      });
      </script>

      <!-- failure modal -->
      <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <i class="far fa-times-circle fa-5x"></i> <br /><br />
              <h1>LOW BALANCE!</h1>
              <p class="modelbodycontent">
                Transfer failed due to low balance in <?php echo $fromname ?>'s account.
              </p>
            </div>
          </div>
        </div>
      </div>

    <?php } } ?>


 </body>
