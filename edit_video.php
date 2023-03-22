<?php

$servername = "sql12.freemysqlhosting.net";
$username = "sql12603359";
$password = "7fSf6yVhTL";
$dbname = "sql12603359";
$conn = new mysqli($servername, $username, $password, $dbname);

$conn->set_charset("utf8mb4");

// 檢查連線是否成功
if ($conn->connect_error) {
    die("連線失敗: " . $conn->connect_error);
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

    <title>video edit</title>
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

                          $video_id = mysqli_real_escape_string($conn, $_GET['id']);
                          $query = "SELECT * FROM video WHERE id='$video_id'";
                          $query_run = mysqli_query($conn, $query);

                          if (mysqli_num_rows($query_run) > 0){
                            $video = mysqli_fetch_array($query_run);
                            ?>
              
                            <form action="receive.php" method="POST">
                                <input type="hidden" name="video_id" value="<?= $video['id']; ?>">
                              
                                <div class="mb-3">
                                    <label>&ensp;url</label>
                                    <input type="text" name="url" value="<?= $video['url']; ?>" class="form-control">
                                </div>
                                
                                <div class="mb-3">
                                    <button type="submit" name="update_video" class="btn btn-primary">儲存</button>
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