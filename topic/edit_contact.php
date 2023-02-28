<?php
session_start();
$host = "localhost";
$username = "root";
$password = "root";
$database = "chatbot";  

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>contact edit</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>編輯聯絡資訊 
                            <a href="contact.php" class="btn btn-danger float-end">返回</a>
                        </h4>
                    </div>
                    <div class="card-body">

                      <?php
                        if (isset($_GET['id'])){

                          $contact_id = mysqli_real_escape_string($conn, $_GET['id']);
                          $query = "SELECT * FROM contact WHERE id='$contact_id'";
                          $query_run = mysqli_query($conn, $query);

                          if (mysqli_num_rows($query_run) > 0){
                            $contact = mysqli_fetch_array($query_run);
                            ?>
              
                            <form action="receive.php" method="POST">
                                <input type="hidden" name="contact_id" value="<?= $contact['id']; ?>">
                              
                                <div class="mb-3">
                                    <label>&ensp;聯絡人</label>
                                    <input type="text" name="name" value="<?= $contact['name']; ?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>&ensp;電子信箱</label>
                                    <input type="email" name="email" value="<?= $contact['email']; ?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>&ensp;LINE ID</label>
                                    <input type="text" name="line_id" value="<?= $contact['line_id']; ?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>&ensp;手機號碼</label>
                                    <input type="phone" name="phone" value="<?= $contact['phone']; ?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="update_contact" class="btn btn-primary">儲存</button>
                                </div>

                            </form>

                            <?php
                          }
                          else{
                            echo "<h4>No Such ID Found</h4>";
                          }
                        }
                      ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>