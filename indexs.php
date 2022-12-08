<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

?>


<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
    <link rel="stylesheet" href="styles.css" />
    <title>DASHBOARD</title>
  </head>
  <body>
    <div class="menu-bar">
      <h1 class="logo">AVR<span>Garment.</span></h1>
      <ul>
      <li><a href="#">Cloth Entry <i class="fas fa-caret-down"></i></a>
      <div class="dropdown-menu">
            <ul>
              <li><a href="cloth.php">Cloth Inward</a></li>
              <li><a href="clothreg.php">Cloth Reg.</a></li>
              <li><a href="partyupdate.php">Partywise Update</a></li>
            </ul>
          </div>
      </li>
          <li><a href="#">Cutting Entry<i class="fas fa-caret-down"></i></a>
          <div class="dropdown-menu">
            <ul>
              <li><a href="cutting.php">Cutting Inward</a></li>
              <li><a href="cuttingreg.php">Cutting Reg.</a></li>
            </ul>
          </div>
        </li>
        <li><a href="#">Stitching Entry <i class="fas fa-caret-down"></i></a>
          <div class="dropdown-menu">
            <ul>
              <li><a href="Outward.php">Outward</a></li>
              <li><a href="inward.php">Inward</a></li>
              <li><a href="payment.php">Payment</a></li>
              <li><a href="paymententry.php">Payment Entry</a></li>
            </ul>
          </div>
        </li>
        <li><a href="#">Press Entry <i class="fas fa-caret-down"></i></a>

            <div class="dropdown-menu">
                <ul>
                  <li><a href="press.php">Inward</a></li>
                  <li><a href="ppayment.php">Payment</a></li>
              </div>
        </li>
        <li><a href="#">PW Report<i class="fas fa-caret-down"></i></a>
        <div class="dropdown-menu">
                <ul>
                  <li><a href="partycu1.php">Cutting Report</a></li>
                  <li><a href="partyst1.php">Stitching Report</a></li>
                  <li><a href="partypr1.php">Press Report</a></li>
                  <li><a href="partydetailslist.php">Partywise Report</a></li>
                  <li><a href="display.php">Employeewise Report</a></li>
              </div>

        </li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>

    <div class="hero">
      &nbsp;
    </div>
  </body>
</html>
