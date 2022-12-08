<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Press Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="cloth1.css">
    <script>
        function printDiv() {
            var divContents = document.getElementById("GFG").innerHTML;
            var a = window.open('', '', 'height=500, width=500');
            a.document.write('<html>');
            a.document.write('<body> <center><h2>AVR Garment<h2><center><br>');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
    </script>
    <style>
body {
  background-color: #F0F8FF	;
}
</style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Press Payment</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">

                            <form action="" method="POST">
                                <div class="form-group">
                                    <input type="text" name="emp_name" value="<?php if(isset($_GET['EMP'])){echo $_GET['EMP'];} ?>"class="form-control" splaceholder="Name" required>

                                </div><br>
                                <div class="row">
                                     <div class="col-md-4">
                                         <div class="form-group">
                                             <label>From Date</label>
                                             <input type="date" name="from_date" class="form-control" required>
                                         </div>
                                    </div>
                                    <div class="col-md-4">
                                            <div class="form-group">
                                                 <label>To Date</label>
                                                 <input type="date" name="to_date" class="form-control" required>
                                            </div>
                                        </div>
                                </div><br>
                                <button type="submit" name="search_by_name" class="btn btn-primary">Search</button>
                                
                            </form><br>

                            </div>
                        </div>
                        
                            <br>
                        <div class="table-responsive">
                            <div id="GFG">
                            <?php
                        if(isset($_POST['search_by_name']))
                        {
                            echo $_POST['emp_name'];
                        }
                       
                        ?><br>
                        <table id="Table"class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">DATE</th>
                                <th scope="col">ITEM NAME</th>
                                
                                <th scope="col">QUANTITY</th>
                                <th scope="col">PRICE</th>
                                <th scope="col">TOTAL VALUE</th>
                                
                            </tr>
                            </thead>
                            </div>
                            <tbody>
                            <?php
                            $connection=mysqli_connect("localhost","root","","inward");
                            if(isset($_POST['search_by_name']))
                            {
                                $name=$_POST['emp_name'];
                                $from=$_POST['from_date'];
                                $to=$_POST['to_date'];
                                $query="SELECT * FROM payment WHERE DATE BETWEEN '$from' AND '$to' AND EMP='$name'";
                                $query_run=mysqli_query($connection, $query);
                                $total=mysqli_num_rows($query_run);
                            if($total>0)
                            {
                                while($row = mysqli_fetch_array($query_run))
                                {
                            ?>
                                
                                <tr>
                                    <td><input type="text" disabled value="<?php echo $row['DATE']; ?>"></td>
                                    <td><input type="text" disabled value="<?php echo $row['ITEM']; ?>"></td>
                                   <!-- <td><input type="text" disabled value="<?php echo $row['EMP']; ?>"></td>-->
                                    <td><input type="text" disabled value="<?php echo $row['QUANTITY']; ?>"></td>
                                    <td><input type="text" disabled value="<?php echo $row['PRICE']; ?>"></td>
                                    <td align="right"><input type="text"disabled  value="<?php echo $row['TOTAL']; ?>"></td>
                                   
                                    
                                </tr>
                                
                                <?php
                                
                                }
                            }
                            else
                            {
                                ?>
                                <tr>
                                <td colspan="6">No Record Found</td>
                            </tr>
                            
                                <?php
                                
                            }
                            
                            
                                ?>
                                
                            </tbody>

                            <tfoot align="">
                            
                                <tr>
                                <td colspan="2">Total:</td>
                                
                                <?php

                                $querys="SELECT sum(QUANTITY) FROM payment WHERE DATE BETWEEN '$from' AND '$to' AND EMP='$name'";
                                $results = mysqli_query($connection,$querys) or die(mysqli_error());
                                while($rows = mysqli_fetch_array($results)){?>
                                 <td colspan=""align=""><input type="text" disabled value="<?php echo $rows['sum(QUANTITY)']; ?>"></td>
                                <?php
                                }
                            
                                ?>

                                <?php

                                $querys="SELECT sum(TOTAL) FROM payment WHERE DATE BETWEEN '$from' AND '$to' AND EMP='$name'";
                                $results = mysqli_query($connection,$querys) or die(mysqli_error());
                                while($rows = mysqli_fetch_array($results)){?>
                                 <td colspan="5"align="right"><input type="text" disabled value="<?php echo $rows['sum(TOTAL)']; ?>"></td>
                                <?php
                                }
                            }
                                ?> 
                                </tr>

                                
                        </tfoot> 
                            
                        
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <table align="center">
    <tr>
    <td><input type="button" onclick="printDiv();" value="Print"/></td>
    
    </tr>
    </table>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body> 
</html>