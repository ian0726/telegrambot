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

    <title>teaching edit</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>編輯訓練資訊 
                            <a href="500.php" class="btn btn-danger float-end">返回</a>
                        </h4>
                    </div>
                    <div class="card-body">

                      <?php
                        if (isset($_GET['id'])){

                          $teaching_id = mysqli_real_escape_string($conn, $_GET['id']);
                          $query = "SELECT * FROM teaching WHERE id='$teaching_id'";
                          $query_run = mysqli_query($conn, $query);

                          if (mysqli_num_rows($query_run) > 0){
                            $teaching = mysqli_fetch_array($query_run);
                            ?>
              
                            <form action="receive.php" method="POST">
                                <input type="hidden" name="teaching_id" value="<?= $teaching['id']; ?>">
                              
                                <div class="mb-3">
                                    <label>&ensp;Question</label>
                                    <input type="text" name="question" value="<?= $teaching['question']; ?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>&ensp;Solution</label>
                                    <input type="text" name="solution" value="<?= $teaching['solution']; ?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="update_teaching" class="btn btn-primary">儲存</button>
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