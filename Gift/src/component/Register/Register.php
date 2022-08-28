<?php
include('../Stogare/Stogare.php');
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql = 'INSERT INTO `Customer` (`FullName`, `Email`,`Phone`, `Address`, `Password`, `Created`) VALUES
        ('.$_POST['registerName'].', '.$_POST['registerEmail'].','.$_POST['registerPhone'].', '.$_POST['registerAddress'].', '.$_POST['registerPass'].', '.$_POST['registerCreated'].')';
    // echo '<script>
    //             localStorage.setItem("isRegister", "Registed");
    //      </script>';
    // echo 'INSERT INTO `Customer` (`ID`, `FullName`, `Email`,`Phone`, `Address`, `Password`, `Created`) VALUES
    // (99,'.$_POST['registerName'].', '.$_POST['registerEmail'].','.$_POST['registerPhone'].', '.$_POST['registerAdress'].', '.$_POST['registerPass'].', '.$_POST['registerCreated'].'),
    // ';
    if ($connection->Query($sql) == true) {
        //Thông báo nếu thành công
        echo 'Thêm thành công';
    }
    else {
        //Hiện thông báo khi không thành công
        echo 'Không thành công. Lỗi' . $connect->error;

    }
}