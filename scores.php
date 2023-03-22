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
        <title>模擬測驗</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
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
                    <li><a class="dropdown-item" href="../SA2/login.php">登入</a></li>
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
                            <a class="nav-link" href="500.php">
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
                        <h1 class="mt-4">模擬訓練</h1>
                       
                     
                       
                       
                      
            <?php
          
          // 建立 MySQL 連線
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
          
          // 執行 SQL 查詢，查詢 scores 資料表中的資料
          $sql = "SELECT stu_name.sname, AVG(scores.score) AS avg_score, latest_score.score AS latest_score
FROM scores
JOIN stu_name ON scores.chat_id = stu_name.chat_id
JOIN (SELECT chat_id, score FROM scores ORDER BY id DESC) AS latest_score ON scores.chat_id = latest_score.chat_id
GROUP BY scores.chat_id";

$result = $conn->query($sql);

// 如果有查詢到資料，則將資料以表格形式輸出
if ($result->num_rows > 0) {
    echo '<div class="card mb-4">
    <div class="card-header">
    <i class="fas fa-table me-1"></i>
    小學伴表現紀錄
    </div>
    <div class="card-body">
    <table id="datatablesSimple">
    <thead>
    <tr>
    <th>小學伴姓名</th>
    <th>平均學習分數</th>
    <th>最新表現評分</th>
    </tr>
    </thead>
    <tbody>';
    while($row = $result->fetch_assoc()) {
    if ($row["avg_score"] < 2.5) {
    echo "<tr><td>" . $row["sname"] . "</td><td><span style='color:red'>" . $row["avg_score"] . "</span></td><td>" . $row["latest_score"] . "</td></tr>";
    } else {
    echo "<tr><td>" . $row["sname"] . "</td><td>" . $row["avg_score"] . "</td><td>" . $row["latest_score"] . "</td></tr>";
    }
    }
    echo '</tbody></table></div></div>';
    } else {
    echo "沒有找到資料";
    }

// 關閉資料庫連線
$conn->close();
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
