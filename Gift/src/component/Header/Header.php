<?php

function Headerr($checkLogin) {
    $collapseAccount = Collapse('login', 'collapseLogin', Submit());
    $collapseHelp = Collapse('help', 'collapseHelp', 'Help Collapse');
    $collapseCart = Collapse('login', 'collapseCart', '
        <form id="" action="">
            <div class="collapse-text">
                Giỏ hàng trống
            </div>
            <div class="collapse-footer">
                <a class="forgot-password defaultAnimation text-decoration-none text-dark" href="">Mua sắm</a>
                <button class="login-btn button button--default button--theme-dark">
                    <span class="button__text">Giỏ hàng</span>
                    <span class="button__arrow">
                        <span class="button__arrow-chevron"></span>
                        <span class="button__arrow-line"></span>
                    </span>
                </button>
            </div>
        </form>
    ');
    if($checkLogin == 'login') {
        $customerLogin = json_decode($_SESSION['customerLogin'], true);
        $collapseLoged = Collapse('login', 'collapseLoged', Loged(explode(' ', $customerLogin['FullName'])[count(explode(' ', $customerLogin['FullName'])) - 1]));
        $actionString = '
        <!-- Loged Colapse -->
        '.$collapseLoged.'
        <!-- Cart Colapse -->
        '.$collapseCart.'
        <div class="action-login">
            <div class="action-user defaultAnimation cs-pt" data-bs-toggle="collapse" href="#collapseLoged" role="button" aria-expanded="false" aria-controls="collapseExample">
                '.explode(' ', $customerLogin['FullName'])[count(explode(' ', $customerLogin['FullName'])) - 1].'
            </div>
            <span class="mx-3"></span>
            <div class="action-cart defaultAnimation cs-pt" data-bs-toggle="collapse" href="#collapseCart" role="button" aria-expanded="false" aria-controls="collapseExample">
                Giỏ hàng
            </div>
        </div>
        ';
    } else {
        $actionString = '
        <div class="action-no-login">
            <div class="no-login__account defaultAnimation cs-pt" data-bs-toggle="collapse" href="#collapseLogin" role="button" aria-expanded="false" aria-controls="collapseExample">
                Tài khoản
            </div>
            <span class="mx-3"></span>
            <div class="no-login__help defaultAnimation cs-pt" data-bs-toggle="collapse" href="#collapseHelp" role="button" aria-expanded="false" aria-controls="collapseExample">
                Trợ giúp
            </div>
        </div>
        ';
    }
    return '
    <link rel="stylesheet" href="../../Header/Header.module.css">
    <!-- Header -->
    <input class="invisible p-0 mx-2 text-nowrap" type="checkbox" name="checkbox" id="overlay-checkbox">
    <div class="overlay"></div>
    <header id="header" class="header">
        <!-- Navbar -->
        <nav class="flex-nowrap navbar navbar-expand-lg navbar-light bg-transparent p-0 d-flex justify-content-end">
            <div class="container bg-transparent">
                <!-- Nav List -->
                <ul class="navbar-nav text-start mb-2 mb-lg-0 align-items-center">
                    <a class="header-logo navbar-brand fw-bold fs-1" href="#">PHP</a>
                    <div class="collapse navbar-collapse">
                        <li class="nav-item">
                            <a class="nav-link p-0 mx-2 defaultAnimation text-nowrap" href="#">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-0 mx-2 defaultAnimation text-nowrap" href="#product-list-title">Shop</a>
                        </li>
                    </div>
                </ul>
                <!-- Action -->
                '.$actionString.'
                <!-- SearchIcon -->
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </nav>
        <!-- Login Colapse -->
        '.$collapseAccount.'
        <!-- Help Colapse -->
        '.$collapseHelp.'
        </header>
        <script defer type="module" src="../../Header/Header.js"></script>
    ';
}