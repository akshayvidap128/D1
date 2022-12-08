<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stitching Update Entry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="cloth1.css">

    <script src="jquery-3.6.0.min.js"></script>
    <script>
		$(document).ready(function(){
    	// Get value on keyup funtion
    	$("#quantity, #damage").keyup(function(){
        var total=0;   	
    	var x = Number($("#quantity").val());
    	var y = Number($("#damage").val());
    	var total=x - y;
    	$('#tquantity').val(total);
    });
});
</script>
<style>
body {
  background-color: #F0F8FF	;
}
</style>
<script>
		$(document).ready(function(){
    	// Get value on keyup funtion
    	$("#price, #tquantity").keyup(function(){

        var value=0;     	
        var a = Number($("#price").val());
    	var b = Number($("#tquantity").val());
    	var value=a * b; 

    	$('#totalvalue').val(value);

    });
});
</script>
</head>
<body>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">

                <div class="card mt-5">
                    <div class="card-header text-center">
                        <h4>Update Entry</h4>
                    </div>
                    <div class="card-body">
<?php 
$con = mysqli_connect("localhost","root","","inward");
$id=$_GET['id'];
$select="SELECT * FROM format WHERE id='$id'";
$data=mysqli_query($con,$select);
$row=mysqli_fetch_array($data);
?>

<?php
if(isset($_POST['update_btn']))
{
    $TDATE=$_POST['TDATE'];
    $DAMAGE=$_POST['DAMAGE'];
    $TQUANTITY=$_POST['TQUANTITY'];
    $TNAME=$_POST['TNAME'];
    $PRICE=$_POST['PRICE'];
    $TOTALVALUE=$_POST['TOTALVALUE'];
    $update="UPDATE format SET TDATE='$TDATE',DAMAGE='$DAMAGE',TQUANTITY='$TQUANTITY',TNAME='$TNAME',PRICE='$PRICE',TOTALVALUE='$TOTALVALUE' WHERE id='$id'";
    $data=mysqli_query($con,$update);
    if($data)
    {
        ?>
            <script>
                alert ("Data Updated Successfully")<a href="inward.php"></a>;
                
            </script>
        <?php
    }
    else
    {
        echo "Failed";
    }
}
?>
<form method="post">
    <table style="width:50%" align="center">
    <tr>
        <td><h5>Date<h5></td>
        <td>
            <input type="date" name= "date" disabled value="<?= $row['DATE']; ?>"></td>
    </tr>
    <tr>
        <td><h5>TDate<h5></td>
        <td>
            <input type="date" name= "TDATE" required></td>
    </tr>
   <!-- <tr>
        <td><h5>Bill No.<h5></td>
        <td>
            <input type="number" name= "bill" value="<?= $row['EMP']; ?>"></td>
    </tr>-->
    
    <tr>
        <td><h5>Perticular<h5></td>
        <td>
            <input type="Text" name= "perticular" disabled value="<?= $row['PERTICULAR']; ?>"></td>
    </tr>
    <tr>
        <td><h5>Partyname<h5></td>
        <td>
            <input type="text" name= "partyname" disabled value="<?= $row['PARTYNAME']; ?>"></td>
    </tr>
    <tr>
        <td><h5>Emp Name<h5></td>
        <td>
            <input type="Text" name= "emp" disabled value="<?= $row['EMP']; ?>"></td>
    </tr>
    <tr>
        <td><h5>Quantity<h5></td>
        <td>
            <input type="number" id="quantity" name= "quantity"  disabled value="<?= $row['QUANTITY']; ?>"></td>
    </tr>
    <tr>
        <td><h5>Giver Name<h5></td>
        <td>
            <input type="Text" name= "givername" disabled value="<?= $row['GIVERNAME']; ?>"></td>
    </tr>
    <tr>
        <td><h5>Damage<h5></td>
        <td>
            <input type="Text" id="damage" name= "DAMAGE" required></td>
    </tr>
    <tr>
        <td><h5>Total Quantity<h5></td>
        <td>
            <input type="Text" id="tquantity" name= "TQUANTITY" required></td>
    </tr>
    <tr>
        <td><h5>Price<h5></td>
        <td>
            <input type="Text" id="price" name= "PRICE" required></td>
    </tr>
    <tr>
        <td><h5>Total Value<h5></td>
        <td>
            <input type="Text" id="totalvalue" name= "TOTALVALUE" required></td>
    </tr>
    <tr>
        <td><h5>Taker Name<h5></td>
        <td>
            <input type="Text" name= "TNAME" required></td>
    </tr>
    <tr>
        <td></td>
        <td>
        <div class="col-md-4">
        <button type="submit" name="update_btn" class="btn btn-primary">Update</button></td>
        <td><button type="submit" ><a href="inward.php">Back</a></button></td>
    </tr>
</table>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>



