<?php include './connection.php'; ?>
<?php
  if(isset($_POST['search'])){
    $search = $_POST['search'];
    $sql = "SELECT * FROM `blogdetail` WHERE `author` = '$search'";
    $result = mysqli_query($connection,$sql);
    
    if($result){
      if(mysqli_num_rows($result) == 0){
        echo "No";
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
            <a href="./fullblogpage.php" class="btn btn-primary" style="width: 100%">Read Full Blog</a>
          </div>
        </div>';
        }
      }
    }
  }else{
    $sql = "SELECT * FROM `blogdetail`";
    $result = mysqli_query($connection,$sql);
  
    if($result){
      foreach($result as $row){
        echo '<div class="card m-2" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title text-justify">'.(strlen($row['title']) > 49 ? substr($row['title'],0,50).'...' : $row['title']).'</h5>
          <p class="card-text text-justify">'.(strlen($row['description']) > 199 ? substr($row['description'],0,200).'...' : $row['description']).'</p>
          <div class="d-flex justify-content-between align-items-center">
            <p><b>'.$row['author'].'</b></p>
            <p><b>'.$row['date'].'</b></p>
          </div>
          <a href="./fullblogpage.php" class="btn btn-primary" style="width: 100%">Read Full Blog</a>
        </div>
      </div>';
      }
    }
  }
?>