import { $, $$ } from "../Component.js";

const productItem = $$('.product-item');
const productHeartBtn = $$('.product-heart__btn'); 
const productCartBtn = $$('.product-cart__btn'); 
const productInfoBtn = $$('.product-info__btn'); 
var Product = {
    eventHandle() {
        Array.from(productItem).forEach(item => {
            item.onclick = (e) => {
                e.preventDefault();
                jQuery.ajax({
                    url: '../../Logical/ProductDetail/ProductDetail.php',
                    type: 'POST',
                    dataType: 'html',
                    data: {
                        productID: item.children[5].innerHTML
                    }
                }).done(function(result) {
                    jQuery('.product-id').html(result);
                    if(localStorage.getItem("showProduct") == 'show') {
                        localStorage.removeItem("showProduct");
                        window.location.replace('../ProductInfo/ProductInfo.php');
                    }
                });
            }
        });
    },
    setTooltip() {
        for(let i = 0; i < Array.from(productItem).length; i++) {
            let productHeartTooltip = new bootstrap.Tooltip(Array.from(productHeartBtn)[i], {
                container: Array.from(productHeartBtn)[i],
                animation: true,
                title: "Thích",
                placement: "bottom",
            });
            let productCartTooltip = new bootstrap.Tooltip(Array.from(productCartBtn)[i], {
                container: Array.from(productCartBtn)[i],
                animation: true,
                title: "Thêm",
                placement: "bottom",
            });
            let productInfoTooltip = new bootstrap.Tooltip(Array.from(productInfoBtn)[i], {
                container: Array.from(productInfoBtn)[i],
                animation: true,
                title: "Xem",
                placement: "bottom",
            });
        }
    },
    start() {
        this.setTooltip();
        this.eventHandle();
    }
}

Product.start();