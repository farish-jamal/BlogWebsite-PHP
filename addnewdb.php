<?php
    if(isset($_POST['title'])){
        $title = $_POST['title'];
        $description = $_POST['description'];
        $author = $_POST['author'];

        $sql = "INSERT INTO `blogdetail` (`sno`, `author`, `title`, `description`, `date`) VALUES (NULL, '$author', '$title', '$description', current_timestamp())";
        $result = mysqli_query($connection, $sql);

        if($result){
            echo '<div class="alert alert-primary" role="alert">
              Your Blog Is Uploaded Sucessfully, Keep Writting!
          </div>';
        }else{
            echo "Failed";
        }
    }
?>