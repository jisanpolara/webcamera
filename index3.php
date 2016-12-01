<?php include_once("config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Capture Image</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<style type="text/css">
    .bs-example{
    	margin: 20px;
    }
</style>
</head>
<body>

<center>
<form action="upload.php" method="post" enctype="multipart/form-data">
       <?php if($_GET['upload']==1) { ?>
         <h2 style="color:#F00"> Please Capture Image </h2>
       <?php } ?>
       
       <div class="bs-example">
    <table class="table">
        <thead>
            <tr>
            <td>
            Capture Image :    
            </td>
            <td>
              <input type="file" name="fileToUpload" id="fileToUpload" accept="image/*" capture="camera" class="upload" />
   	        </td>     
    		</tr>
            
            <tr>
            <td>
            Location :
            </td>
            <td>
            <input type="text" name="location" id="location"/>
            </td>
            </tr>        
            
            
            <tr>
            <td colspan="2">
               <input type="submit" value="Choose file to capture image" name="submit">
            </td>
            </tr>
       </thead>
       </table>  
</form>
</center>


<div class="bs-example">
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Image</th>
                <th>Location</th>
                <th>Date/Time</th>
            </tr>
        </thead>
        <tbody>
  <?php $query = mysql_query("select * from webcamera_tb"); 
        $count = mysql_num_rows($query); 
		if($count > 0)
		{
			while($data = mysql_fetch_array($query))
			{
  ?>      
            <tr>
                <td><?php echo $data['webcamera_id']; ?></td>
                <td><img src="uploads/<?php echo $data['webcamera_image']; ?>" height="100px" width="100px"/></td>
                <td><?php echo $data['webcamera_location']; ?></td>
                <td><?php echo $data['webcamera_time']; ?></td>
            </tr>
     <?php }} ?>       
            
        </tbody>
    </table>
</div>
</body>
</html>                                		