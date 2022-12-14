import { $ } from "../Component.js";

var Login = {
    handleEvent() {
        // Transfer
        function Transfer(formHide, formShow) {
            jQuery(`.${formHide}`).hide();
            jQuery(`.${formShow}`).show();
            $('.login-collapse__text .container').classList.remove(`style-${formHide}`);
            $('.login-collapse__text .container').classList.add(`style-${formShow}`);
        }
        // Transfer Form (Register, Login, Next)
        function transferForm(formStransfer) {
            if(formStransfer == 'login-form') {
                Transfer('transfer-form', 'login-form');
            } else if(formStransfer == 'register-form') {
                Transfer('transfer-form', 'register-form');
            } else if(formStransfer == 'transfer-form') {
                if($('.login-collapse__text .container').getAttribute('class').includes('style-login-form') == true) {
                    Transfer('login-form', 'transfer-form');
                } else if($('.login-collapse__text .container').getAttribute('class').includes('style-register-form') == true) {
                    Transfer('register-form', 'transfer-form');
                }
            }
        }
        if(!localStorage.getItem('status')) {
            $('.next-login__btn').addEventListener('click', () => {
                transferForm('login-form');
            });
            $('.next-register__btn').addEventListener('click', () => {
                transferForm('register-form');
            });
            [$('.no-login__help'), $('.overlay'), $('.no-login__account')].forEach((item) => {
                item.addEventListener('click', () => {
                    transferForm('transfer-form');
                });
            });
        }
        // Login Form Validate
        jQuery('#login-form').validate({
            rules: {
                "email": {
                    email: true,
                    required: true
                },
                "password": {
                    required: true,
                    minlength: 8
                }
            },
            messages: {
                "email": {
                    required: "Vui l??ng nh???p ?????a ch??? email",
                    maxlength: "H??y nh???p t???i ??a 15 k?? t???"
                },
                "password": {
                    required: "Vui l??ng nh???p m???t kh???u",
                    minlength: "M???t kh???u ph???i c?? ??t nh???t 8 k?? t???"
                }
            },
            submitHandler: function (form) {
                localStorage.setItem('loginValidate', 'success');
            }
            
        });
        // Login Form Validate
        jQuery('#register-form').validate({
            rules: {
                "email": {
                    email: true,
                    required: true
                },
                "name": {
                    required: true,
                    minlength: 8
                },
                "password": {
                    required: true,
                    minlength: 8
                },
                "phone": {
                    required: true,
                    minlength: 10
                },
                "address": {
                    required: true,
                    minlength: 8
                },
                "date": {
                    date: true,
                    required: true,
                    minlength: 8
                }
            },
            messages: {
                "email": {
                    required: "Vui l??ng nh???p ?????a ch??? email",
                    email: "Vui l??ng nh???p ????ng ?????a ch??? email"
                },
                "password": {
                    required: "Vui l??ng nh???p m???t kh???u",
                    minlength: "M???t kh???u ph???i c?? ??t nh???t 8 k?? t???"
                },
                "date": {
                    required: "Vui l??ng nh???p m???t kh???u",
                    date: "Vui l??ng nh???p ????ng ?????nh d???ng ng??y th??ng yy/mm/dd"
                },
                "date": {
                    required: "Vui l??ng nh???p m???t kh???u",
                    date: "Vui l??ng nh???p ????ng ?????nh d???ng ng??y th??ng yy/mm/dd"
                }
            },
            submitHandler: function (form) {
                localStorage.setItem('registerValidate', 'success');
            }
        });
        // Login
        if(localStorage.getItem('status') == null) {
            $('.login-btn').addEventListener('click', (e) => {
                if(localStorage.getItem('loginValidate') == 'success') {
                    jQuery.ajax({
                        url: '../../Logical/Login/Login.php',
                        type: 'POST',
                        dataType: 'html',
                        data: {
                            userEmail: jQuery('.login-input__email input').val(),
                            userPass: jQuery('.login-input__password input').val()
                        }
                    }).done(function(result) {
                        jQuery('.login-notify').html(result);
                        if(localStorage.getItem('status') == 'signIn') {
                            window.location.reload();
                        } else {
                            jQuery('.login-notify').text("Sai th??ng tin t??i kho???n ho???c m???t kh???u!");
                        }
                    });
                }
            });
        }
        // ????ng xu???t
        if(localStorage.getItem('status') == 'signIn') {
            $('.log-out__btn').addEventListener('click', (e) => {
                e.preventDefault();
                if(localStorage.getItem('loginValidate') == 'success') {
                    jQuery.ajax({
                        url: '../../Logical/Login/Login.php',
                        type: 'POST',
                        dataType: 'html',
                        data: {
                            logOut: 'logOut'
                        }
                    }).done(function() {
                        if(localStorage.getItem('status') == 'signIn' && localStorage.getItem('loginValidate') == 'success') {
                            localStorage.removeItem('status');
                            localStorage.removeItem('loginValidate')
                            window.location.reload();
                        }
                    });
                }
            });
        }
        // Register
        $('.register-btn').addEventListener('click', (e) => {
            var date = new Date();
            jQuery.ajax({
                url: '../../Register/Register.php',
                type: 'POST',
                dataType: 'html',
                data: {
                    registerName: `'${jQuery('.register-input__name input').val()}'`,
                    registerEmail: `'${jQuery('.register-input__email input').val()}'`,
                    registerPass: `'${jQuery('.register-input__password input').val()}'`,
                    registerPhone: `'${jQuery('.register-input__phone input').val()}'`,
                    registerAddress: `'${jQuery('.register-input__address input').val()}'`,
                    registerCreated: `'${date.getDate()}/${date.getMonth()}/${date.getFullYear()}'`
                }
            }).done(function(result) {
                // if(localStorage.getItem('registerValidate') == 'success') {
                //     alert('????ng k?? th??nh c??ng');
                //     DeleteCookie('isRegister');
                // }
            });
        });
    },
    start() {
        this.handleEvent();
    }
}

Login.start();