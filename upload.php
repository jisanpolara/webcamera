<?php
include_once("config.php");
if($_FILES["fileToUpload"]["name"]=='')
{
?>
	  <script>location.href="index3.php?upload=1"</script>
<?php
 }
$target_dir = "uploads/";
$image_name = basename(mktime().'_'.$_FILES["fileToUpload"]["name"]);
$target_file = $target_dir . basename(mktime().'_'.$_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
     //   echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
      //  echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "JPG" && $imageFileType != "JPEG" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
         mysql_query("insert into webcamera_tb(webcamera_image,webcamera_location,webcamera_time) values ('".$image_name."','".$_POST['location']."',now())");
	  ?>
	  <script>location.href="index3.php"</script>
	  <?php
    
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?> 