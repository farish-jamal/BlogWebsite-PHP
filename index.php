<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>

      
    <?php include './navbar.php'; ?>
    <?php include './connection.php'; ?>
    <h2 class="text-center my-4 ">Latest Blog On Our Site</h2>
    <div class="container mt-4 d-flex align-items-center flex-wrap justify-content-center">
        <?php
              if(isset($_GET['delete'])){
                $sno = $_GET['delete'];
                $sql = "DELETE FROM `blogdetail` WHERE `sno` = $sno";
                $result = mysqli_query($connection, $sql);
            
                if($result){
                  header("Location: index.php");
                }
              }
        ?>
        <?php include './mainblog.php'; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>