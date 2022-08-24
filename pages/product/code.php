<?php
include '../includes/security.php';

//add items page
if (isset($_POST['save_product'])) {
	$category = $_POST['product_category'];
	$name = $_POST['product_name'];
	$description = $_POST['product_description'];
	$sprice = $_POST['product_smallprice'];
	$mprice = $_POST['product_mediumprice'];
	$lprice = $_POST['product_largeprice'];
	$availability = $_POST['product_availability'];
	$images = $_FILES["product_image"]['name'];

	$validate_img_extension = $_FILES["product_image"]['type'] == "image/jpg" ||
		$_FILES["product_image"]['type'] == "image/png" ||
		$_FILES["product_image"]['type'] == "image/jpeg";

	if ($validate_img_extension) {

		if (file_exists("upload/" . $_FILES["product_image"]["name"])) {
			$store = $_FILES["product_image"]["name"];
			$_SESSION['status'] = "Image already exists. '.$store.'";
			header('Location: items.php');
		} else {

			$query = "INSERT INTO menu (Category,Name,Picture,Description,PriceSmall,PriceMedium,PriceLarge,Availability) VALUES ('$category','$name','$images','$description','$sprice','$mprice','$lprice','$availability')";

			$query_run = mysqli_query($connection, $query);

			if ($query_run) {
				//echo "saved";
				move_uploaded_file($_FILES["product_image"]["tmp_name"], "upload/" . $_FILES["product_image"]["name"]);
				// $_SESSION['success'] = "Product Added";
				$_SESSION['status'] = "Item Successfully ADDED";
				$_SESSION['status_code'] = "success";
				header('Location: items.php');
			} else {
				// $_SESSION['status'] = "Product Not Added";
				$_SESSION['status'] = "Product is NOT ADDED";
				$_SESSION['status_code'] = "error";
				header('Location: items.php');
			}
		}
	} else {
		//$_SESSION['status'] = "Only PNG, JPG, JPEG Images are allowed";
		$_SESSION['status'] = "Only PNG, JPG, JPEG Images are allowed";
		$_SESSION['status_code'] = "error";
		header('Location: items.php');
	}
}

//add item1 page
if (isset($_POST['save_product1'])) {
	$category = $_POST['product_category'];
	$name = $_POST['product_name'];
	$description = $_POST['product_description'];
	$sprice = $_POST['product_smallprice'];
	$mprice = $_POST['product_mediumprice'];
	$lprice = $_POST['product_largeprice'];
	$availability = $_POST['product_availability'];
	$images = $_FILES["product_image"]['name'];

	$validate_img_extension = $_FILES["product_image"]['type'] == "image/jpg" ||
		$_FILES["product_image"]['type'] == "image/png" ||
		$_FILES["product_image"]['type'] == "image/jpeg";

	if ($validate_img_extension) {

		if (file_exists("upload/" . $_FILES["product_image"]["name"])) {
			$store = $_FILES["product_image"]["name"];
			$_SESSION['status'] = "Image already exists. '.$store.'";
			header('Location: items1.php');
		} else {

			$query = "INSERT INTO menu (Category,Name,Picture,Description,PriceSmall,PriceMedium,PriceLarge,Availability) VALUES ('$category','$name','$images','$description','$sprice','$mprice','$lprice','$availability')";

			$query_run = mysqli_query($connection, $query);

			if ($query_run) {
				//echo "saved";
				move_uploaded_file($_FILES["product_image"]["tmp_name"], "upload/" . $_FILES["product_image"]["name"]);
				// $_SESSION['success'] = "Product Added";
				$_SESSION['status'] = "Item Successfully ADDED";
				$_SESSION['status_code'] = "success";
				header('Location: items1.php');
			} else {
				// $_SESSION['status'] = "Product Not Added";
				$_SESSION['status'] = "Product is NOT ADDED";
				$_SESSION['status_code'] = "error";
				header('Location: items1.php');
			}
		}
	} else {
		//$_SESSION['status'] = "Only PNG, JPG, JPEG Images are allowed";
		$_SESSION['status'] = "Only PNG, JPG, JPEG Images are allowed";
		$_SESSION['status_code'] = "error";
		header('Location: items1.php');
	}
}

// Update product Details items page

if (isset($_POST['update_btn'])) {
	$edit_id = $_POST['edit_ItemNo'];
	$edit_name = $_POST['edit_name'];
	$edit_category = $_POST['edit_category'];
	$edit_description = $_POST['edit_description'];
	$edit_sprice = $_POST['edit_smallprice'];
	$edit_mprice = $_POST['edit_mediumprice'];
	$edit_lprice = $_POST['edit_largeprice'];
	$edit_availability = $_POST['edit_availability'];

	$edit_product_image =  $_FILES["product_image"]['name'];

	//$img_types = array('image/jpg','image/png','image/jpeg');
	//$validate_img_extension = in_array($_FILES["product_image"]['type'], $img_types);


	$product_query = "SELECT * FROM menu WHERE ItemNo='$edit_id' ";
	$product_query_run = mysqli_query($connection, $product_query);

	foreach ($product_query_run as $pr_row) {
		//echo $pr_row['p_image'];
		if ($edit_product_image == NULL) {
			//update with existing image
			$image_data = $pr_row['Picture'];
		} else {
			//Update with new image and delete the old image
			if ($img_path = "upload/" . $pr_row['Picture']) {
				unlink($img_path); //delete the image000000
				$image_data = $edit_product_image;
			}
		}
	}

	$query = "UPDATE menu SET Category='$edit_category', Name='$edit_name',Picture='$image_data',Description='$edit_description',PriceSmall='$edit_sprice',PriceMedium='$edit_mprice',PriceLarge='$edit_lprice',Availability='$edit_availability' WHERE ItemNo='$edit_id' ";
	$query_run = mysqli_query($connection, $query);


	if ($query_run) {
		if ($edit_product_image == NULL) {
			// $_SESSION['success'] = "Product Updated with existing image";
			$_SESSION['status'] = "Item Successfully UPDATED with existing image";
			$_SESSION['status_code'] = "success";
			header('Location: items.php');
		} else {
			//Update with new image and delete the old image
			move_uploaded_file($_FILES["product_image"]["tmp_name"], "upload/" . $_FILES["product_image"]["name"]);
			//$_SESSION['success'] = "Product Updated";
			$_SESSION['status'] = "Item Successfully UPDATED";
			$_SESSION['status_code'] = "success";
			header('Location: items.php');
		}
	} else {
		// $_SESSION['status'] = "product is NOT Updated";
		$_SESSION['status'] = "Item is NOT UPDATED";
		$_SESSION['status_code'] = "error";
		header('Location: items.php');
	}
}

// Update product Details items1 page

if (isset($_POST['update_btn1'])) {
	$edit_id = $_POST['edit_ItemNo'];
	$edit_name = $_POST['edit_name'];
	$edit_category = $_POST['edit_category'];
	$edit_description = $_POST['edit_description'];
	$edit_sprice = $_POST['edit_smallprice'];
	$edit_mprice = $_POST['edit_mediumprice'];
	$edit_lprice = $_POST['edit_largeprice'];
	$edit_availability = $_POST['edit_availability'];

	$edit_product_image =  $_FILES["product_image"]['name'];

	//$img_types = array('image/jpg','image/png','image/jpeg');
	//$validate_img_extension = in_array($_FILES["product_image"]['type'], $img_types);


	$product_query = "SELECT * FROM menu WHERE ItemNo='$edit_id' ";
	$product_query_run = mysqli_query($connection, $product_query);

	foreach ($product_query_run as $pr_row) {
		//echo $pr_row['p_image'];
		if ($edit_product_image == NULL) {
			//update with existing image
			$image_data = $pr_row['Picture'];
		} else {
			//Update with new image and delete the old image
			if ($img_path = "upload/" . $pr_row['Picture']) {
				unlink($img_path); //delete the image000000
				$image_data = $edit_product_image;
			}
		}
	}

	$query = "UPDATE menu SET Category='$edit_category', Name='$edit_name',Picture='$image_data',Description='$edit_description',PriceSmall='$edit_sprice',PriceMedium='$edit_mprice',PriceLarge='$edit_lprice',Availability='$edit_availability' WHERE ItemNo='$edit_id' ";
	$query_run = mysqli_query($connection, $query);


	if ($query_run) {
		if ($edit_product_image == NULL) {
			// $_SESSION['success'] = "Product Updated with existing image";
			$_SESSION['status'] = "Item Successfully UPDATED with existing image";
			$_SESSION['status_code'] = "success";
			header('Location: items1.php');
		} else {
			//Update with new image and delete the old image
			move_uploaded_file($_FILES["product_image"]["tmp_name"], "upload/" . $_FILES["product_image"]["name"]);
			//$_SESSION['success'] = "Product Updated";
			$_SESSION['status'] = "Item Successfully UPDATED";
			$_SESSION['status_code'] = "success";
			header('Location: items1.php');
		}
	} else {
		// $_SESSION['status'] = "product is NOT Updated";
		$_SESSION['status'] = "Item is NOT UPDATED";
		$_SESSION['status_code'] = "error";
		header('Location: items1.php');
	}
}

//delete product items
if ($_GET['id']) {
	$id = $_GET['id'];
	$query = "DELETE  FROM menu WHERE  ItemNo='$id' ";
	$query_run = mysqli_query($connection, $query);

	if ($query_run) {
		echo "Product data deleted successfully";
		$_SESSION['status'] = "Product Successfully DELETED";
		$_SESSION['status_code'] = "success";
	} else {
		echo "Error deleting record";
		$_SESSION['status'] = "Product is NOT DELETED";
		$_SESSION['status_code'] = "error";
	}
}
