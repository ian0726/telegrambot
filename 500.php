<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>行前訓練管理系統-訓練資訊</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index2.php">行前訓練管理系統</a>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item">徐安辰</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">                            
                            <div class="sb-sidenav-menu-heading">項目編輯</div>
                            <a class="nav-link" href="edit_train.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                模擬訓練
                            </a>                    
                            <a class="nav-link" href="500.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                訓練資訊
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                聯絡協會
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">                                    
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages"></div>                                                                   
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">項目查看</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                教學日誌回報
                            </a>                           
                        </div>
                    </div>                    
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">相關文章及影片</h1>
                        <ol class="breadcrumb mb-4"></ol>
                        <?php
                            include('message.php');
                        ?>
                        
                        <form method="post" action="receive.php">&ensp;新增文章：
                            <input type="text" name="url" placeholder="請輸入文章網址" size="56">
                            
                            <button class="btn btn-primary" name="save_article" type="submit">新增</button>
                        </form>
                        <br />
                        <form method="post" action="receive.php">&ensp;新增影片：
                            <input type="text" name="url" placeholder="請輸入影片網址" size="56">
                            
                            <button class="btn btn-primary" name="save_video" type="submit">新增</button>
                        </form>
                        <br />
                      相關文章
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>文章</th>
                                            
                                            <th>編輯</th>
                                            <th>刪除</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
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
                                              

                                            $query = "SELECT * FROM article";
                                            $query_run = mysqli_query($conn, $query);

                                            if(mysqli_num_rows($query_run) > 0){
                                                foreach($query_run as $article){
                                                    ?>
                                                    <tr>
                                                        <td><?= $article['id']; ?></td>
                                                        <td><?= $article['url']; ?></td>
                                                       
                                                        <td>
                                                            <a href="edit_article.php?id=<?= $article['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                        </td>
                                                        <td>                                         <!--在同一行-->
                                                            <form action="receive.php" method="POST" class="d-inline">
                                                                <button type="submit" name="delete_article" value="<?=$article['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            else{
                                                echo "<h5> No Record Found </h5>";
                                            }
                                        ?>
                                
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                相關影片
                            </div>
                            <div class="card-body">
                                <table class="table table-striped"><!--table-bordered-->
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>影片</th>
                              
                                            <th>編輯</th>
                                            <th>刪除</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
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
                                              
                                            if (!$conn) {
                                            die("Connection failed: " . mysqli_connect_error());
                                            }

                                            $query = "SELECT * FROM video";
                                            $query_run = mysqli_query($conn, $query);

                                            if(mysqli_num_rows($query_run) > 0){
                                                foreach($query_run as $video){
                                                    ?>
                                                    <tr>
                                                        <td><?= $video['id']; ?></td>
                                                        <td><?= $video['url']; ?></td>
                                                        
                                                        <td>
                                                            <a href="edit_video.php?id=<?= $video['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                        </td>
                                                        <td>
                                                            <form action="receive.php" method="POST" class="d-inline">
                                                                <button type="submit" name="delete_video" value="<?=$video['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            else{
                                                echo "<h5> No Record Found </h5>";
                                            }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto"></footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
