<?php
// function ProductDetail($str) {
//     return '
//         <link rel="stylesheet" href="../../ProductDetail/ProductDetail.module.css">
//         <script defer type="module" src="../../ProductDetail/ProductDetail.js"></script>
//         <div class="product-detail container">
//             <nav aria-label="breadcrumb">
//                 <ol class="breadcrumb">
//                 <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
//                 <li class="breadcrumb-item active" aria-current="page">Sản phẩm</li>
//                 </ol>
//             </nav>
//         </div>
//     ';
// }

include('../../Stogare/Stogare.php');
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['productID'])) {
        foreach($productListAll as $product) {
            if($_POST['productID'] == $product['ID']) {
                $_SESSION['thisProduct'] = json_encode($product);
                echo '<script> localStorage.setItem("showProduct", "show"); </script>';
                break;
            }
        }
    }
}