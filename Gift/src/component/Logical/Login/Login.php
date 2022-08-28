<?php
include('../../Stogare/Stogare.php');
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if((isset($_POST['userEmail']) && isset($_POST['userPass'])) && ($_POST['userEmail'] != '' && $_POST['userPass'] != '')) {
        foreach($customerList as $customer) {
            if(trim($customer['Email']) == trim($_POST['userEmail']) && trim($customer['Password']) == trim($_POST['userPass'])) {
                $_SESSION['isLogin'] = 'signIn';
                $_SESSION['customerLogin'] = json_encode($customer);
                echo '<script> localStorage.setItem("status", "signIn"); </script>';
                break;
            }
        }
    }
    if(isset($_POST['logOut'])) {
        unset($_SESSION['isLogin']);
        unset($_SESSION['customerLogin']);
    }
}