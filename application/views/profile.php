<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>Basic Profile</h2>
    <form action="<?php echo base_url('user/create_profile');?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="pwd">Image:</label>
            <input type="file" class="form-control" id="pwd"  name="image">
            <label for="pwd">Image:</label>
            <input type="text" class="form-control" id="pwd"  name="name" required>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
    <?php if ($name != null){ ?>
    <label for="pwd">Name :</label>
    <label for="pwd"><?php echo $name; ?></label> <br> <?php } ?>
    <img src="<?php if ($image != null){ echo base_url("application/assets/uploads/").$image; }?>">
</div>

</body>
</html>
