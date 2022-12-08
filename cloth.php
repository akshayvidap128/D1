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
    <title>Cloth Inward</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="cloth1.css">
    <style>
body {
  background-color: #F0F8FF	;
}
</style>
</head>
<body>
<div class="skin-black layout-boxed sidebar-mini">
        <div class="row justify-content-center">
            <div class="col-md-7">

                <div class="card mt-5">
                    <div class="card-header text-dark text-center">
                        <h4>Cloth Entry</h4>
                    </div>
                    <div class="card-body">
<form method="post">
    <table style="width:50%" align="center">
    <tr>
        <td><h5>Date<h5></td>
        <td>
            <input class="input100" type="date" name= "date" required></td>
            
    </tr>
    <tr>
        <td><h5>Invoice No.<h5></td>
        <td>
            <input class="input100" type="number" name= "invoice" required></td>
    </tr>
    <tr>
        <td><h5>Party Name<h5></td>
        <td>
            <input class="input100" type="text" name= "pname" required></td>
    </tr>
    <tr>
        <td><h5>Cloth Name<h5></td>
        <td>
            <input class="input100" type="Text" name= "cloth" required></td>
    </tr>
    <tr>
        <td><h5>Cloth mtr<h5></td>
        <td>
            <input class="input100" type="float" name= "cmtr" required></td>
    </tr>
    <tr>
        <td></td>
        <td><br>
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
$con=mysqli_connect("localhost","root","","inward");
if(isset($_POST['submit']))
{
    $d1=$_POST['date'];
    $b1=$_POST['invoice'];
    $l1=$_POST['pname'];
    $p1=$_POST['cloth'];
    $q1=$_POST['cmtr'];
    $query="INSERT INTO cloth(DATE,INVOICENO,PARTYNAME,CLOTH,CLOTHMTR) VALUES('$d1','$b1','$l1','$p1','$q1')";
    $run=mysqli_query($con,$query);
    if($run==1)
    {
        $result="INSERT INTO party(EMPNAME) VALUES('$l1')";
        $runn=mysqli_query($con,$result);
        if($runn==1)
        {

        ?>
            <script>
                alert ("Data Updated Successfully");
            </script>
        <?php
        }
        else
        {
            $quey="UPDATE party SET EMPNAME='$l1' WHERE EMPNAME='$l1'";
        }
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