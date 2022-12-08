<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AVR Garment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="jquery-3.6.0.min.js"></script>
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
    <script>
		$(document).ready(function(){
    	// Get value on keyup funtion
    	$("#price, #quantity").keyup(function(){

        var value=0;     	
        var a = Number($("#price").val());
    	var b = Number($("#quantity").val());
    	var value=a - b; 

    	$('#total').val(value);

    });
});
</script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Search</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">

                            <form action="" method="POST">
                                <div class="form-group">
                                    <input type="text" name="emp_name" value="<?php if(isset($_GET['PARTYNAME'])){echo $_GET['PARTYNAME'];} ?>"class="form-control" splaceholder="Name" required>

                                </div><br>

                                <button type="submit" name="search_by_name" class="btn btn-primary">Search</button>
                                
                            </form><br>

                            </div>
                        </div>
                        
                            
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
                                <!--<th scope="col">Invoice No.</th>
                                <th scope="col">Date</th>-->
                                
                                <th scope="col">PARTYNAME</th>
                                <th scope="col">Cloth MTR</th>
                                <th scope="col">Used MTR</th>
                                <th scope="col">Remaining MTR</th>

                                
                                
                            </tr>
                            </thead>
                            </div>
                            <tbody>
                            <?php
                            $connection=mysqli_connect("localhost","root","","inward");
                            if(isset($_POST['search_by_name']))
                            {
                                $name=$_POST['emp_name'];
                                $query="SELECT SUM(DISTINCT (c.CLOTHMTR)) AS clothMtr, SUM(DISTINCT(b.USEDMTR)) AS UsedMtr,c.PARTYNAME AS partyname FROM cloth AS c
                                INNER JOIN cutting b ON c.PARTYNAME=b.PARTYNAME WHERE c.PARTYNAME='$name'";
                                
                                $query_run=mysqli_query($connection,$query);
                                $total=mysqli_num_rows($query_run);
                            if($total>0)
                            {
                                while($row = mysqli_fetch_array($query_run))
                                {
                            ?>
                                
                                <tr>
                                    <!--<td><input type="text" disabled value="<?php echo $row['id']; ?>"></td>
                                    <td><input type="text" disabled value="<?php echo $row['TDATE']; ?>"></td>-->
                                    <td><input type="text" disabled value="<?php echo $row['partyname']; ?>"></td>
                                    <td><input type="text" id="price" disabled value="<?php echo $row['clothMtr']; ?>"></td>
                                    <td><input type="text" id="quantity"  value="<?php echo $row['UsedMtr']; ?>"></td>
                                    <td><input type="text" id="total" ></td>
                                    
                                    
                                    
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