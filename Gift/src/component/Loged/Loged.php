<?php

function Loged($str) {
    return '
        <div class="loged-form">
            <div class="collapse-text">
                Xin chào '.$str.'.</br>
                Hiện tại bạn có thể chỉnh sửa thông tin cá nhân và mua hàng trực tuyến
            </div>
            <div class="collapse-footer">
                <button style="font-size: 0.9rem"class="log-out__btn border-0 defaultAnimation bg-transparent text-decoration-none text-dark">Đăng xuất</button>
                <button class="next-info__btn button button--default button--theme-dark">
                    <span class="button__text">Thông tin</span>
                    <span class="button__arrow">
                        <span class="button__arrow-chevron"></span>
                        <span class="button__arrow-line"></span>
                    </span>
                </button>
            </div>
        </div>
    ';
}