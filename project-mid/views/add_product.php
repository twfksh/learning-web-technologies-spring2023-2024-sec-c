<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | OpenCrowd</title>
</head>
<body>
    <?php include_once('navbar.php'); ?>
    
    <form style="margin: auto; width: 50%;" method="post" action="../controllers/insert_product.php" enctype="multipart/form-data">
        <fieldset>
            <legend>Add Product</legend>
            Name:  <br> <input type="text" name="name" placeholder="Product Name"> <hr>
            Headline: <br> <input type="text" name="headline" placeholder="Write a headline" style="width: 99%;"> <br> <hr>
            Description: <br> <textarea name="description" placeholder="Product Description" rows="4" cols="50"></textarea> <br> <hr>
            URL: <br> <input type="url" name="url" placeholder="https://example.com"> <br> <hr>
            Image: <br> <input type="file" name="image" accept="image/*"> <br> <hr>
            Launch Date:  <br> <input type="date" name="launch_date" required /> <br> <hr>
            Published By: <br> <input type="text" name="publishedBy" placeholder="Publisher's Username"> <br> <hr>
            <input type="submit" name="submit" value="Add Product">
            <input type="reset" name="reset" value="Clear">
        </fieldset>
    </form>
</body>
</html>
