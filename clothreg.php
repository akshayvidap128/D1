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
    <title>Cloth Register</title>
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
                        <h4 class="card-title">Cloth Register</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">

                            <form action="" method="POST">
                                <div class="form-group">
                                    <input type="text" name="party_name" value="<?php if(isset($_GET['PARTYNAME'])){echo $_GET['PARTYNAME'];} ?>"class="form-control" splaceholder="Name" required>
                                <br>
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
                            echo $_POST['party_name'];
                        }
                       
                        ?><br>
                        <table id="Table"class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">DATE</th>
                                <th scope="col">INVOICE NO.</th>
                                
                                <th scope="col">CLOTH</th>
                                
                                <th scope="col">CLOTH MTR</th>
                            </tr>
                            </thead>
                            </div>
                            <tbody>
                            <?php
                            $connection=mysqli_connect("localhost","root","","inward");
                            if(isset($_POST['search_by_name']))
                            {
                                $name=$_POST['party_name'];
                                $query="SELECT * FROM cloth WHERE PARTYNAME='$name'";
                                $query_run=mysqli_query($connection, $query);
                                $total=mysqli_num_rows($query_run);
                            if($total>0)
                            {
                                while($row = mysqli_fetch_array($query_run))
                                {
                            ?>
                                
                                <tr>
                                    <td><input type="text" disabled value="<?php echo $row['DATE']; ?>"></td>
                                    <td><input type="text" disabled value="<?php echo $row['INVOICENO']; ?>"></td>
                                  
                                    <td><input type="text" disabled value="<?php echo $row['CLOTH']; ?>"></td>
                                    
                                    <td><input type="text" id="price"  value="<?php echo $row['CLOTHMTR']; ?>"></td>
                                   
                                    
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
                                <td colspan="3">Total:</td>
                                
                                <?php
                                $connection=mysqli_connect("localhost","root","","inward");
                                $querys="SELECT sum(CLOTHMTR) FROM cloth WHERE PARTYNAME='$name'";
                                $results = mysqli_query($connection,$querys) or die(mysqli_error());
                                while($rows = mysqli_fetch_array($results)){?>
                                 <td colspan=""align=""><input type="text" disabled value="<?php echo $rows['sum(CLOTHMTR)']; ?>"></td>
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
    <br>
    <table>
    <tr>
    <td align="center"><input type="button" onclick="printDiv();" value="Print"/></td>
    </tr>
    </table>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body> 
</html>