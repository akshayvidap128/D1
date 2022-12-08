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
    <title>Partywise Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="cloth1.css">
    <script src="jquery-3.6.0.min.js"></script>
    <style>
body {
  background-color: #F0F8FF	;
}
    
</style>
<script>
		$(document).ready(function(){
    	// Get value on keyup funtion
    	$("#clothmtr, #usedmtr").keyup(function(){
        var total=0;   	
    	var x = Number($("#clothmtr").val());
    	var y = Number($("#usedmtr").val());
    	var total=x - y;
    	$('#remaining').val(total);
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
                        <h4>Partywise Update</h4>
                    </div>
                    <div class="card-body">
<form method="post">
    <table style="width:50%" align="center">
    <tr>
        <td><h5>Party Name<h5></td>
        <td>
            <input class="input100" type="Text" name= "emp" required></td>
    </tr>
    <tr>
        <td><h5>Cloth MTR<h5></td>
        <td>
            <input class="input100" type="float" name= "clothmtr" id="clothmtr" required></td>
    </tr>
    <tr>
        <td><h5>Used MTR<h5></td>
        <td>
            <input class="input100" type="float" name= "usedmtr" id="usedmtr" required></td>
    </tr>
    <tr>
        <td><h5>Remaining<h5></td>
        <td>
            <input class="input100" type="float" name= "remaining" id="remaining" required></td>
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
$connection=mysqli_connect("localhost","root","","inward");
if(isset($_POST['submit']))
{
    $d1=$_POST['emp'];
    $b1=$_POST['clothmtr'];
    $l1=$_POST['usedmtr'];
    $m1=$_POST['remaining'];
    $query="UPDATE party SET CLOTHMTR='$b1',USEDMTR='$l1',REMAINING='$m1' WHERE EMPNAME='$d1'";
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