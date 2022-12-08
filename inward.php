<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stitching Inward Entry</title>
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
</head>
<body>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">

                <div class="card mt-5">
                    <div class="card-header text-center">
                        <h4>Inward Entry</h4>
                    </div>
                    <div class="card-body">
<form method="">
    <table style="width:50%" align="center">
    <!--<tr>
        <td><h5>Date<h5></td>
        <td>
            <input type="date" name= "date" required></td>
    </tr>-->
    <tr>
        <td><h5>Bill No.<h5></td>
        <td>
            <input type="number" name="form_id" value="<?php if(isset($_GET['form_id'])){echo $_GET['form_id'];} ?>" class="form-control"></td><br>
       <!-- <td>
            <div class="col-md-4">
            <button type="submit" class="btn btn-primary">Search</button></td>
            </div>
        <td>-->
    </tr>
</table>
</form>
<div class="row">
    <div class="col-md-12">
    <hr>
         <?php 
          $con = mysqli_connect("localhost","root","","inward");

            if(isset($_GET['form_id']))
            {
                $form_id = $_GET['form_id'];

                $query = "SELECT * FROM format WHERE id='$form_id' ";
                $query_run = mysqli_query($con, $query);

                    if(mysqli_num_rows($query_run) > 0)
                    {
                        foreach($query_run as $row)
                            {
          ?>
                            <div class="form-group mb-3">
                            <label for="">TDate</label>
                            <input type="Date" name= "date" value="<?= $row['TDATE']; ?>" disabled class="form-control">
                            <!--</div>
                            <div class="form-group mb-3">-->
                            <label for="">Perticular</label>
                            <input type="text" disabled name= "perticular" value="<?= $row['PERTICULAR']; ?>" class="form-control">

                            <label for="">Partyname</label>
                            <input type="text" disabled name= "partyname" value="<?= $row['PARTYNAME']; ?>" class="form-control">
                           <!-- </div>
                            <div class="form-group mb-3">-->
                            <label for="">Emp name</label>
                            <input type="text" disabled name= "emp" value="<?= $row['EMP']; ?>" class="form-control">
                            <!--</div>
                            <div class="form-group mb-3">-->
                            <label for="">Quantity</label>
                            <input type="number" id="quantity" disabled name= "quantity" value="<?= $row['QUANTITY']; ?>" class="form-control">

                            <label for="">Damage</label>
                            <input type="number" name= "damage" disabled value="<?= $row['DAMAGE']; ?>"class="form-control">

                            <label for="">Total Quantity</label>
                            <input type="number" id="tquantity" disabled name= "tquantity" value="<?= $row['TQUANTITY']; ?>" class="form-control">
                            <!--</div>-->
                            <!--<div class="form-group mb-3">-->
                            <label for="">Taker Name</label>
                            <input type="text" name= "tname" disabled value="<?= $row['TNAME']; ?>"class="form-control">
                            <!--</div>-->
                            <label for="">Price</label>
                            <input type="text" name= "price" disabled value="<?= $row['PRICE']; ?>"class="form-control"><br>
                            <form>
                            <table align="center">
                                <tr>
                            <td><button type="submit" ><a href="inwardre.php?id=<?php echo $row['id'];?>">Update</a></button></td>
                          
                            </tr> 
                            </table>
                            </form>
                            <?php
                            }
                                }
                                    else
                                      {
                                          echo "No Record Found";
                                      }
                                }
                                   
                            ?>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </div>
     </div>
</div>
<table>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body> 
</html>