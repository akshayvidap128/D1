<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employeewise Payment Entry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="cloth1.css">
    <style>
body {
  background-color: #F0F8FF	;
}
</style>
</head>
<body>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">

                <div class="card mt-5">
                    <div class="card-header text-center">
                        <h4>Employeewise Payment Entry</h4>
                    </div>
                    <div class="card-body">
<form method="post">
    <table style="width:50%" align="center">
    <tr>
        <td><h5>From Date<h5></td>
        <td>
            <input class="input100" type="date" name= "from" required></td>
    
    
        <td><h5>To Date<h5></td>
        <td>
            <input class="input100" type="date" name= "to" required></td>
    </tr>
    <tr>
        <td><h5>Emp Name<h5></td>
        <td>
            <input  type="Text" name= "emp" required></td>
    </tr>
    <tr>
        <td><h5>Total Quantity<h5></td>
        <td>
            <input  type="number" name= "tquantity" required></td>
    </tr>
    <tr>
        <td><h5>Total Amount<h5></td>
        <td>
            <input  type="number" name= "tamount" required></td>
    </tr>
    <tr>
        <td></td>
        <td>
        <div class="col-md-4">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button></td>
        </div>
    </tr>
</table>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
<?php
$connection=mysqli_connect("localhost","root","","payment");
if(isset($_POST['submit']))
{
    $d1=$_POST['from'];
    $b1=$_POST['to'];
    $l1=$_POST['emp'];
    $m1=$_POST['tquantity'];
    $p1=$_POST['tamount'];
    $query="INSERT INTO format(FROMDATE,TODATE,EMP,TQUANTITY,TAMOUNT) VALUES('$d1','$b1','$l1','$m1','$p1')";
    $run=mysqli_query($connection,$query);
    if($run)
    {
        ?>
            <script>
                alert ("Data Updated Successfully");
            </script>
        <?php
    }
    else
    {
        echo "Failed";
    }
    
}
?>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>