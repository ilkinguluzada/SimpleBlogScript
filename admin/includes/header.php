<?php include("../config/config.php");?>
<?php include("../libraries/Database.php");?>
<?php include("../helpers/format_helper.php");?>

       
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>ADMIN</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

     <!-- OUR CSS -->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
  

    <!-- Custom styles for this template -->
    <link href="http://getbootstrap.com/examples/blog/blog.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item active" href="index.php">Admin Panel</a>
          <a class="blog-nav-item" href="add_post.php">Yazı Yaz</a>
          <a class="blog-nav-item" href="add_category.php">Kateqoriya Əlavə Et</a>
          <a class="blog-nav-item" href="../index.php">Bloqa Bax</a>
          
        </nav>
      </div>
    </div>

    <div class="container">

      <div class="blog-header">
        <h2 class="blog-title">Admin Panel</h2>
        
      </div>

      <div class="row">

        <div class="col-sm-8 blog-main">
        <?php if(isset($_GET['msg'])) : ?>

          <div class="alert alert-success"><?php echo htmlentities($_GET['msg']); ?></div>

        <?php endif; ?>