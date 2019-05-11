<?php
if (!session_id()) {
  session_start();
}

$conn = mysqli_connect('localhost','root','','test_bootcamp');

if (isset($_POST['user'])) {
  $name = $_POST['name'];
  $sql = "INSERT INTO users(name) VALUES
          ('$name')";
  $result = mysqli_query($conn,$sql);

  if ($result) {
    $_SESSION['message'] = 'Data Programmer berhasil ditambahkan';
    header('Location: index.php');
  } else {
    $_SESSION['message'] = 'Data Programmer gagal ditambahkan';
    header('Location: index.php');
  }
  
}elseif (isset($_POST['skill'])) {
  $user_id = $_POST['user_id'];
  $name = $_POST['name'];

  $sql = "INSERT INTO skills(name,user_id) VALUES
          ('$name','$user_id')";

  $result = mysqli_query($conn,$sql);

  if ($result) {
    $_SESSION['message'] = 'Data Skill berhasil ditambahkan';
    header('Location: index.php');
  } else {
    $_SESSION['message'] = 'Data Skill gagal ditambahkan';
    header('Location: index.php');
  }
}else{

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Data Programmer</title>
  </head>
  <body>
    <?php if (isset($_SESSION['message'])): ?>  
    
    <div class="alert alert-success" style="position: fixed; top:0;right: 0;left: 0;"> 
      <button class="close" data-dismiss="alert">&times;</button>
      <?= $_SESSION['message'] ?>
    </div>
         
    <?php
    unset($_SESSION['message']);
    endif ?>
    <div class="container">

      <div class="card mt-5">
        <div class="card-body">
        <!-- ========================================== form tambah programmer ========================================== -->
          <form method="post">
            <div class="input-group mb-3">
              <input name="name" type="text" class="form-control" placeholder="Nama Programmer" required>
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit" name="user">Tambah</button>
              </div>
            </div>
          </form>
        <!-- ========================================== end form tambah programmer ========================================== -->
        </div>
      </div>

      <div class="card mt-3">
        <div class="card-body">
          <?php

          // menuliskan query
          $sql = "SELECT users.id AS user_id,
                         users.name AS user_name,
                         GROUP_CONCAT(skills.name ORDER BY skills.name SEPARATOR ', ') as skills
            FROM users
            LEFT JOIN skills ON skills.user_id = users.id
            GROUP BY users.name";

          // exsekusi query
          $result = mysqli_query($conn,$sql);

          // menambilkan data
          foreach ($result as $data):
          ?>
          <div class="table-responsive">
            <table class="table table-bordered">
              <tr>
                <td width="550"><?= $data['user_name'] ?></td>
                <td rowspan="2" class="align-middle">
        <!-- ========================================== form tambah skill ========================================== -->
                  <form method="post">
                    <div class="input-group mb-3">
                      <input type="hidden" name="user_id" value="<?= $data['user_id'] ?>">
                      <input name="name" type="text" class="form-control" placeholder="Tambahkan Skill" required>
                      <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" name="skill">Tambah</button>
                      </div>
                    </div>
                  </form>
        <!-- ========================================== end form tambah skill ========================================== -->
                </td>
              </tr>
              <tr>
                <td><?= $data['skills'] ?></td>
              </tr>
            </table>
          </div>
        <?php endforeach ?>
        </div>
      </div>
    </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

<?php } ?>