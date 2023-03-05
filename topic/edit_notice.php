<?php
session_start();
session_start();
$host = "sql12.freemysqlhosting.net";
$username = "sql12601440";
$password = "IS31Sl3ZXn";
$database = "sql12601440";
$query = "SET NAMES 'UTF8'";
                                            
$conn = mysqli_connect($host, $username, $password, $database);
mysqli_query($conn, $query);
        
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

    <title>notice edit</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>編輯基本注意事項 
                            <a href="500.php" class="btn btn-danger float-end">返回</a>
                        </h4>
                    </div>
                    <div class="card-body">

                      <?php
                        if (isset($_GET['id'])){

                          $notice_id = mysqli_real_escape_string($conn, $_GET['id']);
                          $query = "SELECT * FROM notice WHERE id='$notice_id'";
                          $query_run = mysqli_query($conn, $query);

                          if (mysqli_num_rows($query_run) > 0){
                            $notice = mysqli_fetch_array($query_run);
                            ?>
              
                            <form action="receive.php" method="POST">
                                <input type="hidden" name="notice_id" value="<?= $notice['id']; ?>">
                              
                                <div class="mb-3">
                                    <label>&ensp;Question</label>
                                    <input type="text" name="question" value="<?= $notice['question']; ?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>&ensp;Solution</label>
                                    <input type="text" name="solution" value="<?= $notice['solution']; ?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="update_notice" class="btn btn-primary">儲存</button>
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