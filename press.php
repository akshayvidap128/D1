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
    <title>Press Inward</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="cloth1.css">
    <script src="jquery-3.6.0.min.js"></script>
    
    <script>
		$(document).ready(function(){
    	// Get value on keyup funtion
    	$("#price, #quantity").keyup(function(){

        var value=0;     	
        var a = Number($("#price").val());
    	var b = Number($("#quantity").val());
    	var value=a * b; 

    	$('#total').val(value);

    });
});
</script>
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
                        <h4>Press Entry</h4>
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
        <td><h5>Emp Name<h5></td>
        <td>
            <input class="input100" type="text" name= "empname" required></td>
    </tr>
    <tr>
        <td><h5>Item Name<h5></td>
        <td>
            <input class="input100" type="text" name= "itemname" required></td>
    </tr>
    <tr>
        <td><h5>Quantity<h5></td>
        <td>
            <input class="input100" type="number" name= "quantity" id="quantity" required></td>
    </tr>
    <tr>
        <td><h5>Price<h5></td>
        <td>
            <input class="input100" type="float" name= "price" id="price" required></td>
    </tr>
    <tr>
        <td><h5>Total Value<h5></td>
        <td>
            <input class="input100" type="float" name= "total" id="total"required></td>
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
$con=mysqli_connect("localhost","root","","inward");

if(isset($_POST['submit']))
{
    $d1=$_POST['date'];
    $b1=$_POST['empname'];
    $l1=$_POST['itemname'];
    $p1=$_POST['quantity'];
    $e1=$_POST['price'];
    $f1=$_POST['total'];
    $query="INSERT INTO payment(DATE,EMP,ITEM,QUANTITY,PRICE,TOTAL) VALUES('$d1','$b1','$l1','$p1','$e1','$f1')";
    $run=mysqli_query($con,$query);
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