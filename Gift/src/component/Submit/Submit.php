<?php

function Submit() {
    return '
    <link rel="stylesheet" href="../../Submit/Submit.module.css">
    <div class="transfer-form">
        <div class="collapse-text">
            Tạo tài khoản hoặc đăng nhập để đặt hàng, xem đơn đặt hàng hoặc điều chỉnh thông tin cá nhân của bạn.
        </div>
        <div class="collapse-footer">
            <button class="next-register__btn border-0 defaultAnimation text-decoration-none text-dark">Đăng ký</button>
            <button class="next-login__btn button button--default button--theme-dark">
                <span class="button__text">Đăng nhập</span>
                <span class="button__arrow">
                    <span class="button__arrow-chevron"></span>
                    <span class="button__arrow-line"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="login-form">
        <form id="login-form" action="">
            <div class="login-input">
                <div class="login-input__box login-input__email">
                    <div class="login-input__title">Email</div>
                    <input id="email" name="email" required type="text" required placeholder="Email">
                </div>
                <div class="login-input__box login-input__password">
                    <div class="login-input__title">Password</div>
                    <input id="password" name="password" required type="password" required placeholder="Password">
                </div>
                <div style="font-size: 0.9rem; text-align: center;" class="login-notify mt-3"></div>
            </div>
            <div class="collapse-footer">
                <a class="forgot-password defaultAnimation text-decoration-none text-dark" href="">Quên mật khẩu</a>
                <button class="login-btn button button--default button--theme-dark">
                    <span class="button__text">Đăng nhập</span>
                    <span class="button__arrow">
                        <span class="button__arrow-chevron"></span>
                        <span class="button__arrow-line"></span>
                    </span>
                </button>
            </div>
        </form>
    </div>
    <div class="register-form">
        <form id="register-form" action="">
            <div class="register-input d-flex justify-between">
                <div class="register-input-left">
                    <div class="register-input__box register-input__email">
                        <div class="register-input__title">Email</div>
                        <input type="text" name="email" id="email" placeholder="Email">
                    </div>
                    <div class="register-input__box register-input__name">
                        <div class="register-input__title">Họ tên</div>
                        <input type="text" name="name" id="name" placeholder="Nhập tên của bạn">
                    </div>
                    <div class="register-input__box register-input__date">
                        <div class="register-input__title">Ngày sinh</div>
                        <input type="text" name="date" id="date" placeholder="dd/mm/yy">
                    </div> 
                </div>             
                <span class="mx-3"></span>  
                <div class="register-input-right">
                    <div class="register-input__box register-input__password">
                        <div class="register-input__title">Mật khẩu</div>
                        <input type="password" name="password" id="pass" placeholder="Password">
                    </div>
                    <div class="register-input__box register-input__address">
                        <div class="register-input__title">Địa chỉ</div>
                        <input type="text" name="address" id="address" placeholder="Address">
                    </div>
                    <div class="register-input__box register-input__phone">
                        <div class="register-input__title">Số điện thoại</div>
                        <input type="text" name="phone" id="phone" placeholder="Phone">
                    </div>
                </div>
            </div>
            <div class="collapse-footer">
                <a class="rules defaultAnimation cs-pt text-decoration-none text-dark">Điều khoản, chính sách</a>
                <button class="register-btn button button--default button--theme-dark">
                    <span class="button__text">Đăng ký</span>
                    <span class="button__arrow">
                        <span class="button__arrow-chevron"></span>
                        <span class="button__arrow-line"></span>
                    </span>
                </button>
            </div>
        </form>
    </div>
    <script defer src="../../../../node_modules/jquery/dist/jquery.validation.js"></script>
    <script defer type="module" src="../../Submit/Submit.js"></script>
    ';
}