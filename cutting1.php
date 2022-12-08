<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

?>


<?php
$conn=mysqli_connect("localhost","root","","inward");
$sql='SELECT DISTINCT PARTYNAME FROM cloth';
$all_categories=mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AVR Garment</title>
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
                    <div class="card-header text-center">
                        <h4>Outward Entry</h4>
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
        <td><h5>Bill No.<h5></td>
        <td>
            <input class="input100" type="number" name= "bill" required></td>
    </tr>
    <tr>
        <td><h5>Perticular<h5></td>
        <td>
            <input class="input100" type="Text" name= "perticular" required></td>
    </tr>
    <tr>
        <td><h5>Party Name<h5></td>
        <td>
        <select name="partyname" class="input100">
            <?php
                // use a while loop to fetch data
                // from the $all_categories variable
                // and individually display as an option
                while ($cloth = mysqli_fetch_array(
                        $all_categories,MYSQLI_ASSOC)):;
            ?>
                <option value="<?php echo $cloth["PARTYNAME"];
                    // The value we usually set is the primary key
                ?>">
                    <?php echo $cloth["PARTYNAME"];
                        // To show the category name to the user
                    ?>
                </option>
            <?php
                endwhile;
                // While loop must be terminated
            ?>
        </select>
            </td>  
    </tr>
    <tr>
        <td><h5>Emp Name<h5></td>
        <td>
            <input class="input100" type="Text" name= "employeename" required></td>
    </tr>
    <tr>
        <td><h5>Used MTR<h5></td>
        <td>
            <input class="input100" type="float" name= "usedmtr" required></td>
    </tr>
    <tr>
        <td><h5>Quantity<h5></td>
        <td>
            <input class="input100" type="Text" name= "quantity" required></td>
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
    $b1=$_POST['bill'];
    $p1=$_POST['perticular'];
    $l1=$_POST['partyname'];
    $e1=$_POST['employeename'];
    $g1=$_POST['usedmtr'];
    $q1=$_POST['quantity'];
    
    $query="INSERT INTO cutting1
    (DATE,id,PERTICULAR,PARTYNAME,EMPLOYEENAME,USEDMTR,QUANTITY) VALUES('$d1','$b1','$p1','$l1','$e1','$g1','$q1')";
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