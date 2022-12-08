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
    <title>All Partywise Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="cloth1.css">
    <script src="jquery-3.6.0.min.js"></script>
    <script>
        function printDiv() {
            var divContents = document.getElementById("GFG").innerHTML;
            var a = window.open('', '', 'height=500, width=500');
            a.document.write('<html>');
            //a.document.write('<body > <h1><br>');
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
                        <h4 class="card-title">All Partywise Report</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">

                            <form action="" method="POST">
                            <div class="form-group">
                                    <input type="text" name="emp_name"class="form-control" placeholder="AVR Garment Partywise Details" disabled>

                                </div><br>
                                <button type="submit" name="search_by_name" class="btn btn-primary">Search</button>
                                
                            </form><br>

                            </div>
                        </div>
                        <div class="table-responsive">
                            <div id="GFG">
                        <table id="Table"class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">EMP NAME</th>
                                <th scope="col">CLOTH MTR</th>
                                <th scope="col">USED MTR</th>
                                <th scope="col">REMAINING</th>
                                
                            </tr>
                            </thead>
                            </div>
                            <tbody>
                            <?php
                            $connection=mysqli_connect("localhost","root","","inward");
                            if(isset($_POST['search_by_name']))
                            {
                                $query="SELECT * FROM party";
                                $query_run=mysqli_query($connection, $query);
                                $total=mysqli_num_rows($query_run);
                            if($total>0)
                            {
                                while($row = mysqli_fetch_array($query_run))
                                {
                            ?>
                                <tr>
                                    <td><input type="text" disabled value="<?php echo $row['EMPNAME']; ?>"></td>
                                    <td><input type="text" disabled value="<?php echo $row['CLOTHMTR']; ?>"></td>
                                    <td><input type="text" disabled value="<?php echo $row['USEDMTR']; ?>"></td>
                                    
                                    <td><input type="text" disabled value="<?php echo $row['REMAINING']; ?>"></td>
                                    
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
                            
                        }
                                ?>
                                
                            </tbody>

                            
                            
                        
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