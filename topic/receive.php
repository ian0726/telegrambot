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

//新增聯絡資訊
if (isset($_POST['save_contact'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $line_id = mysqli_real_escape_string($conn, $_POST['line_id']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);

    $query = "INSERT INTO contact (name, email, line_id, phone) VALUES ('$name', '$email', '$line_id', '$phone')";
    
    $query_run = mysqli_query($conn, $query);
    if ($query_run){
        $_SESSION['message'] = "聯絡資訊新增成功";
        header("Location: contact.php");
        exit(0);
    }
    else{
        $_SESSION['message'] = "Information Not Created";
        header("Location: contact.php");
        exit(0);
    }
}

//編輯聯絡資訊
if (isset($_POST['update_contact'])){
    $contact_id = mysqli_real_escape_string($conn, $_POST['contact_id']);

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $line_id = mysqli_real_escape_string($conn, $_POST['line_id']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);

    $query = "UPDATE contact SET name='$name', email='$email', line_id='$line_id', phone='$phone' WHERE id='$contact_id' ";

    $query_run = mysqli_query($conn, $query);
    if ($query_run){
        $_SESSION['message'] = "聯絡資訊更新成功！";
        header("Location: contact.php");
        exit(0);
    }
    else{
        $_SESSION['message'] = "Information Not Updated";
        header("Location: contact.php");
        exit(0);
    }
}

//刪除聯絡資訊
if (isset($_POST['delete_contact'])){
    $contact_id = mysqli_real_escape_string($conn, $_POST['delete_contact']);

    $query = "DELETE FROM contact WHERE id='$contact_id' ";

    $query_run = mysqli_query($conn, $query);
    if ($query_run){
        $_SESSION['message'] = "聯絡資訊刪除成功！";
        header("Location: contact.php");
        exit(0);
    }
    else{
        $_SESSION['message'] = "Information Not Deleted";
        header("Location: contact.php");
        exit(0);
    }
}

//刪除教學資訊
if (isset($_POST['delete_teaching'])){
    $teaching_id = mysqli_real_escape_string($conn, $_POST['delete_teaching']);

    $query = "DELETE FROM teaching WHERE id='$teaching_id' ";

    $query_run = mysqli_query($conn, $query);
    if ($query_run){
        $_SESSION['message'] = "教學資訊刪除成功！";
        header("Location: 500.php");
        exit(0);
    }
    else{
        $_SESSION['message'] = "Question Not Deleted";
        header("Location: 500.php");
        exit(0);
    }
}
//刪除基本注意事項
if (isset($_POST['delete_notice'])){
    $notice_id = mysqli_real_escape_string($conn, $_POST['delete_notice']);

    $query = "DELETE FROM notice WHERE id='$notice_id' ";

    $query_run = mysqli_query($conn, $query);
    if ($query_run){
        $_SESSION['message'] = "基本注意事項刪除成功！";
        header("Location: 500.php");
        exit(0);
    }
    else{
        $_SESSION['message'] = "Question Not Deleted";
        header("Location: 500.php");
        exit(0);
    }
}

//編輯教學資訊
if (isset($_POST['update_teaching'])){
    $teaching_id = mysqli_real_escape_string($conn, $_POST['teaching_id']);

    $question = mysqli_real_escape_string($conn, $_POST['question']);
    $solution = mysqli_real_escape_string($conn, $_POST['solution']);

    $query = "UPDATE teaching SET question='$question', solution='$solution' WHERE id='$teaching_id' ";

    $query_run = mysqli_query($conn, $query);
    if ($query_run){
        $_SESSION['message'] = "教學資訊更新成功！";
        header("Location: 500.php");
        exit(0);
    }
    else{
        $_SESSION['message'] = "Question Not Updated";
        header("Location: 500.php");
        exit(0);
    }
}
//編輯基本注意事項
if (isset($_POST['update_notice'])){
    $notice_id = mysqli_real_escape_string($conn, $_POST['notice_id']);

    $question = mysqli_real_escape_string($conn, $_POST['question']);
    $solution = mysqli_real_escape_string($conn, $_POST['solution']);

    $query = "UPDATE notice SET question='$question', solution='$solution' WHERE id='$notice_id' ";

    $query_run = mysqli_query($conn, $query);
    if ($query_run){
        $_SESSION['message'] = "基本注意事項更新成功！";
        header("Location: 500.php");
        exit(0);
    }
    else{
        $_SESSION['message'] = "Question Not Updated";
        header("Location: 500.php");
        exit(0);
    }
}

//新增訓練資訊
if (isset($_POST['save_teaching'])){
    $question = mysqli_real_escape_string($conn, $_POST['question']);
    $solution = mysqli_real_escape_string($conn, $_POST['solution']);

    $query = "INSERT INTO teaching (question, solution) VALUES ('$question', '$solution')";
    
    $query_run = mysqli_query($conn, $query);
    if ($query_run){
        $_SESSION['message'] = "教學資訊新增成功";
        header("Location: 500.php");
        exit(0);
    }
    else{
        $_SESSION['message'] = "Question Not Created";
        header("Location: 500.php");
        exit(0);
    }
}
//新增基本注意事項
if (isset($_POST['save_notice'])){
    $question = mysqli_real_escape_string($conn, $_POST['question2']);
    $solution = mysqli_real_escape_string($conn, $_POST['solution2']);

    $query = "INSERT INTO notice (question, solution) VALUES ('$question', '$solution')";
    
    $query_run = mysqli_query($conn, $query);
    if ($query_run){
        $_SESSION['message'] = "基本注意事項新增成功！";
        header("Location: 500.php");
        exit(0);
    }
    else{
        $_SESSION['message'] = "Question Not Created";
        header("Location: 500.php");
        exit(0);
    }
}
?>