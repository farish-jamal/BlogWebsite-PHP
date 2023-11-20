<?php include './connection.php'; ?>
<?php

  if(isset($_POST['sno'])){
    $sno = $_POST['sno'];
    $titleEdit = $_POST['titleEdit'];
    $descriptionEdit = $_POST['descriptionEdit'];
    $sql = "UPDATE `blogdetail` SET `title` = '$titleEdit', `description` = '$descriptionEdit' WHERE `sno` = $sno";
    $result = mysqli_query($connection, $sql);
    if($result){
      header("Location: index.php?show=$sno");
    }else{
      echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
      There is error in creation" '.mysqli_error($connection).'
      </div>';
    }
  }
  if(isset($_POST['search'])){
    $search = $_POST['search'];
    $sql = "SELECT * FROM `blogdetail` WHERE `author` = '$search'";
    $result = mysqli_query($connection,$sql);
    
    if($result){
      if(mysqli_num_rows($result) == 0){
        echo '<div class="alert alert-warning" role="alert">
         There is no author matching your search -> '.$search.'
      </div>';
      }else{
        foreach($result as $row){
          echo '<div class="card m-2" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title text-justify">'.(strlen($row['title']) > 49 ? substr($row['title'],0,50).'...' : $row['title']).'</h5>
            <p class="card-text text-justify">'.(strlen($row['description']) > 199 ? substr($row['description'],0,200).'...' : $row['description']).'</p>
            <div class="d-flex justify-content-between align-items-center">
              <p><b>'.$row['author'].'</b></p>
              <p><b>'.$row['date'].'</b></p>
            </div>
            <a href="/blogs/index.php?show='.$row['sno'].'" class="btn btn-primary" style="width: 100%">Read Full Blog</a>
          </div>
        </div>';
        }
      }
    }
  }else if(isset($_GET['show'])){
      $show_id = $_GET['show'];
      $sql = "SELECT * FROM `blogdetail` WHERE `sno` = '$show_id'";
      $result = mysqli_query($connection, $sql);

      if($result){
        foreach ($result as $row) {
            echo '<div class="container mt-2">
            <h2 class="text-center my-2">'.$row['title'].'</h2>
            <div class="mx-5 d-flex justify-content-between align-items-center my-3">
              <p style="font-weight: 700">'.$row['author'].'</p>
              <p style="font-weight: 700">'.$row['date'].'</p>
            </div>
            <p class="text-center mb-5">'.$row['description'].'</p>
            <div class="d-flex justify-content-center mb-4">
                <button class="btn btn-primary mx-2 edit" id="'.$row['sno'].'">Edit This Blog</button>
                <button class="btn btn-danger delete" id="'.$row['sno'].'">Delete This Blog</button>
            </div>
            </div>';
        }
      }
  }else{
    $sql = "SELECT * FROM `blogdetail`";
    $result = mysqli_query($connection,$sql);
  
    if($result){
      if(mysqli_num_rows($result) == 0){
        echo '<div><div class="alert alert-warning d-flex align-items-center" role="alert">There Is No Blog On Our Website Right Now, Please Write Blogs.</div>
        <a href="/blogs/addnewblog.php" class="btn btn-primary d-block my-3">Add New Blog</a></div>';
      }else{
        foreach($result as $row){
          echo '
          <div class="card m-2" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title text-justify">'.(strlen($row['title']) > 49 ? substr($row['title'],0,50).'...' : $row['title']).'</h5>
            <p class="card-text text-justify">'.(strlen($row['description']) > 199 ? substr($row['description'],0,200).'...' : $row['description']).'</p>
            <div class="d-flex justify-content-between align-items-center">
              <p><b>'.$row['author'].'</b></p>
              <p><b>'.$row['date'].'</b></p>
            </div>
            <a href="/blogs/index.php?show='.$row['sno'].'" class="btn btn-primary" style="width: 100%">Read Full Blog</a>
          </div>
        </div>';
        }
      }
    }
  }
?>

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

  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close" id="closeModal">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="/blogs/mainblog.php">
              <input type="hidden" name="sno" id="sno">
              <div class="mb-3">
                <label for="title" class="form-label">Title For Blog</label>
                <input type="text" class="form-control" id="titleEdit" name="titleEdit">
              </div>
              <div class="mb-3">
                <label for="author" class="form-label">Author Name</label>
                <input type="text" class="form-control" id="authorEdit" name="authorEdit" readonly>
              </div>
              <div class="mb-3">
                <label for="description" class="form-label">Write Description For Blog</label>
                <textarea class="form-control" name="descriptionEdit" id="descriptionEdit" style="height: 150px"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Update Your Blog</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        edits = document.getElementsByClassName("edit");
        // console.log(edits);
        close = document.getElementById("closeModal");
        close.addEventListener('click', ()=>{
          $('#editModal').modal('hide');
        })
        Array.from(edits).forEach((element) => {
          element.addEventListener('click', (e)=>{
            content = e.target.parentNode.parentNode;
            title = content.getElementsByTagName("h2")[0].innerText;
            description = content.getElementsByTagName("p")[2].innerText;
            author = content.getElementsByTagName("p")[0].innerText;
            date = content.getElementsByTagName("p")[1].innerText;
            // console.log(title, description, author, date);
            titleEdit.value = title;
            descriptionEdit.value = description;
            authorEdit.value = author;
            sno.value = e.target.id;
            $('#editModal').modal('toggle');
          })
        });

        deletes = document.getElementsByClassName("delete");
        Array.from(deletes).forEach((element) => {
          element.addEventListener('click', (e)=>{
            content = e.target.parentNode.parentNode;
            title = content.getElementsByTagName("h2")[0].innerText;
            sno = e.target.id;
            response = confirm(`Do You Want To Delete ${title} Blog?`);
            if(response){
              window.location = `/blogs/index.php?delete=${sno}`;
            }
          })
        });
    </script>
  </body>
</html>