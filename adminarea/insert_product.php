<?php
include("includes/db.php");

?>


<!DOCTYPE HTML>
<html>
<head>
<title></title>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>    
<style type="text/css">
body{
	background-image: url('3.jpg');
    background-size: cover;
	
}
table{
	color:white;
	background-image: url('1.jpg');
    background-size: cover;
}
</style>

</head>
<body>

<form method="POST"  action="insert_product.php" enctype="multipart/form-data">
<table width="700px" height="650px" align="center" border=1px >

<tr align= "center">
<td colspan="2" height=80px><h1>Insert New Movie</h1></td>
</tr>
<tr>
<td align="right" ><b>Movie Name</b></td>
<td ><input type="text" name="product_title" size="50"/></td>
</tr>

<tr>
<td align="right"><b>Movie category</b></td>
<td><select name="product_cat"/>
<option>Select a Category</option>
<?php
			   
			   $get_cats = "select * from categories";
			   $run_cats = mysqli_query($con, $get_cats);
			   while($row_cats = mysqli_fetch_array($run_cats))
			   {   
			   $cat_id= $row_cats['cat_id']; 
			   $cat_title=$row_cats['cat_title'];
			   echo "<option value='$cat_title'>$cat_title</option>";
			   
			   }
			   
			   ?>
</select></td>
</tr>
<tr>
<td align="right"><b>Movie Genre</b></td>
<td><select name="movie_gen"/>
<option>Select a Genre</option>
<?php
			   
			   $get_cats = "select * from genre";
			   $run_cats = mysqli_query($con, $get_cats);
			   while($row_cats = mysqli_fetch_array($run_cats))
			   {   
			   $cat_id= $row_cats['gen_id']; 
			   $cat_title=$row_cats['gen_title'];
			   echo "<option value='$cat_title'>$cat_title</option>";
			   
			   }
			   
			   ?>
</select></td>
</tr>
<tr>
<td align="right"><b>Movie Image 1</b></td>
<td><input type="file" name="product_img1"/></td>
</tr>

<tr>
<td align="right"><b>Movie Description</b></td>
<td><textarea name="product_desc" cols="35" rows="10"></textarea></td>
</tr>
<tr>
<td align="right"><b>Download Links</b></td>
<td><input type="text" name="link" size="50"/></td>
</tr>
<tr>
<td align="right"><b>Movie Keywords</b></td>
<td><input type="text" name="product_keywords" size="50"/></td>
</tr>

<tr align="center">
<td colspan="2"><input type="submit" name="insert_product" value="Insert Movie"/></td>
</tr>

</table>
</form>
</body>
</html>


<?php

if(isset($_POST['insert_product']))
{
	
	//text data variables
	$product_title=$_POST['product_title'];
    $product_cat=$_POST['product_cat'];
	$link=$_POST['link'];
	$genre=$_POST['movie_gen'];
	$product_desc=$_POST['product_desc'];
	$product_keywords=$_POST['product_keywords'];
	
	//image_names
	$product_img1 = $_FILES['product_img1']['name'] ; 
	
	//image temp names
	$temp_name1 = $_FILES['product_img1']['tmp_name'] ; 
	
	
	
	
	if($product_title=='' OR $product_cat=='' OR $link=='' OR $product_desc=='' OR $product_keywords=='' OR $product_img1=='')
	{
		echo "<script>alert('please fill all the fields')</script>";
	    exit();
	}
	else
	{   
		   move_uploaded_file($temp_name1,"product_images/$product_img1"); 
		$insert_product = "insert into movie (cat, gen, movie_title, image, movie_desc, movie_keywords, link) values ('$product_cat', '$genre', '$product_title', '$product_img1', '$product_desc', '$product_keywords', '$link')";
	
	    $run_product= mysqli_query($con, $insert_product);
		
		if($run_product)
		{
			echo "<script> alert('Product inserted successfully') </script>";
		}
	
	}
	

	
	
	
}

?> 


 











