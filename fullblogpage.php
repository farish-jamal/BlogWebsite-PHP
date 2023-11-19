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
    
  <?php include './navbar.php';?>

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
          <form method="post" action="/blogs/addnewblog.php">
              <div class="mb-3">
                <label for="title" class="form-label">Title For Blog</label>
                <input type="text" class="form-control" id="titleEdit" name="titleEdit">
              </div>
              <div class="mb-3">
                <label for="author" class="form-label">Author Name</label>
                <input type="text" class="form-control" id="authorEdit" name="authorEdit">
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

  <a href="/blogs" class="btn btn-primary m-2">Back To Homepage</a>
  <div class="container mt-4">
      <h2 class="text-center my-5">Pindi Aye Hashim Nawaz Therapy JJ47 · 2023 La Haasil Sunny Khan Durrani</h2>
      <div class="mx-5 d-flex justify-content-between align-items-center my-3">
        <p style="font-weight: 700">Farish Jamal</p>
        <p style="font-weight: 700">2023/11/11</p>
      </div>
      <p class="text-center mb-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
      <div class="d-flex justify-content-center">
          <button class="btn btn-primary mx-2 edit">Edit This Blog</button>
          <button class="btn btn-danger edit">Delete This Blog</button>
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
            $('#editModal').modal('toggle');
          })
        });
    </script>
  </body>
</html>
