<?php include './connection.php'; ?>
<?php
  $sql = "SELECT * FROM `blogdetail`";
  $result = mysqli_query($connection,$sql);

  if($result){
    foreach($result as $row){
      echo '<div class="card m-2" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title text-justify">'.substr($row['title'],0,50).'...</h5>
        <p class="card-text text-justify">'.substr($row['description'],0,200).' ...</p>
        <div class="d-flex justify-content-between align-items-center">
          <p><b>'.$row['author'].'</b></p>
          <p><b>'.$row['date'].'</b></p>
        </div>
        <a href="./fullblogpage.php" class="btn btn-primary" style="width: 100%">Read Full Blog</a>
      </div>
    </div>';
    }
  }
?>

<div class="d-flex justify-content-center align-items-center" style="width:">
    <p></p>
</div>