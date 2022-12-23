<?php
// database connection info
include 'connect.php';

//variable declaration
$searchErr = '';
$result='';

// fetching data from database using PHP
if(isset($_POST['submit']))
{
	if(!empty($_POST['search']))
	{
		$search = $_POST['search'];
		// querying the database using select
		$stmt = $con->prepare("select * from services where Country like '%$search%' or service like '%$search%'");
		$stmt->execute();
		// PDO(PHP Data Objects) for accessing databases in PHP
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
	}
	else
	{
		$searchErr = "Please enter the information";
	}
   
}

?>

<html>
<head>
<title>Research Service</title>
<!-- link from bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

<style>
.container{
	width:70%;
	height:30%;
	padding:20px;
}
</style>
</head>

<body>
	<div class="container">
	<h3><u>Research Service</u></h3>
	<br/><br/>
	<form class="form-horizontal" action="#" method="post">
	<div class="row">
		<div class="form-group">
		    <label class="control-label col-sm-4" for="email"><b>Country</b>:</label>
		    <div class="col-sm-4">
		      <input type="text" class="form-control" name="search" placeholder="search here">
		    </div>
            <br>
		    <div class="col-sm-2">
		      <button type="submit" name="submit" class="btn btn-success btn-sm">Submit</button>
		    </div>
		</div>
		<div class="form-group">
			<span class="error" style="color:red;"> <?php echo $searchErr;?></span>
		</div>
		
	</div>
    </form>
	<br/><br/>
	<h3><u>Search Result</u></h3><br/>
	<!-- table created as per the database -->
	<div class="table-responsive">          
	  <table class="table">
	    <thead>
	      <tr>
	        <th>Ref</th>
	        <th>Centre</th>
	        <th>Service</th>
	        <th>Country</th>
	      </tr>
	    </thead>
	    <tbody>
			<!-- PHP will search the data from database and display the result on page-->
	    		<?php
		    	 if(!$result)
		    	 {
		    		echo '<tr>No data found</tr>';
		    	 }
		    	 else{
		    	 	foreach($result as $key=>$value)
		    	 	{
		    	 		?>
		    	 	<tr>
		                <td><?php echo $value['Ref'];?></td>
		    	 		<td><?php echo $value['Centre'];?></td>
		    	 		<td><?php echo $value['Service'];?></td>
		    	 		<td><?php echo $value['Country'];?></td>
		    	 	</tr>
		    	 		
		    	 		<?php
		    	 	}
		    	 	
		    	 }
		    	?>
	    	
	     </tbody>
	  </table>
	</div>
</div>

</body>
</html>

</body>
</html>