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
                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                訓練主體                               
                            </a>                       
                            <a class="nav-link" href="500.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                訓練資訊
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
                        <h1 class="mt-4">聯絡協會</h1>
                        <ol class="breadcrumb mb-4"></ol>
                        <?php
                            include('message.php');
                        ?>
                        <form method="post" action="receive.php">&ensp;請輸入聯絡資訊：&ensp;&emsp;
                            <input type="text" name="name" placeholder="聯絡人" size="27">
                            <input type="email" name="email" placeholder="電子信箱" size="27">
                            <input type="text" name="line_id" placeholder="LINE ID" size="27">
                            <input type="phone" name="phone" placeholder="手機號碼" size="27">
                            <button class="btn btn-primary" name="save_contact" type="submit">新增</button>
                        </form>
                        <br />
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                聯絡資訊
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>聯絡人</th>
                                            <th>電子信箱</th>
                                            <th>LINE ID</th>
                                            <th>手機號碼</th>
                                            <th>編輯</th>
                                            <th>刪除</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th>聯絡人</th>
                                            <th>電子信箱</th>
                                            <th>LINE ID</th>
                                            <th>手機號碼</th>
                                            <th>編輯</th>
                                            <th>刪除</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
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

                                            $query = "SELECT * FROM contact";
                                            $query_run = mysqli_query($conn, $query);

                                            if(mysqli_num_rows($query_run) > 0){
                                                foreach($query_run as $contact){
                                                    ?>
                                                    <tr>
                                                        <td><?= $contact['id']; ?></td>
                                                        <td><?= $contact['name']; ?></td>
                                                        <td><?= $contact['email']; ?></td>
                                                        <td><?= $contact['line_id']; ?></td>
                                                        <td><?= $contact['phone']; ?></td>
                                                        <td>
                                                            <a href="edit_contact.php?id=<?= $contact['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                        </td>
                                                        <td>                                         <!--在同一行-->
                                                            <form action="receive.php" method="POST" class="d-inline">
                                                                <button type="submit" name="delete_contact" value="<?=$contact['id'];?>" class="btn btn-danger btn-sm">Delete</button>
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
