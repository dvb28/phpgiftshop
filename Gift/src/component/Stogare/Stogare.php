<?php
// Kết nối với Database
$connection = new mysqli("localhost","root","","giftshop");

// Kiểm tra kết nối
if($connection -> connect_errno) {
    echo "Kết nối thất bại!! " . $mysqli -> connect_error;
    exit();
}

// Hàm lấy dữ liệu từ trong Database
function GetData($SQLData) {
    $Data = [];
    if (mysqli_num_rows($SQLData) > 0) 
    {
        // Sử dụng vòng lặp while để lặp kết quả
        while($row = mysqli_fetch_assoc($SQLData)) {
            array_push($Data, $row);
        }
        return $Data;
    }
    else {
        echo "Không có dữ liệu";
    }
}

// Danh sách khách hàng
$customerList = GetData($connection->Query('SELECT * FROM customer'));

// Slider
$sliderList = [
    [
        'slider-title' => 'QUÀ LƯU NIỆM',
        'slider-img' => '../../../accest/img/Slider/slider-1.jpg',
        'slider-desc' => 'Những món quà lưu niệm nên mua khi đi du lịch',
        'slider-button' => 'Mua Ngay'
    ],
    [
        'slider-title' => 'QUÀ LƯU NIỆM',
        'slider-img' => '../../../accest/img/Slider/slider-2.jpg',
        'slider-desc' => 'Những món quà lưu niệm nên mua khi đi du lịch',
        'slider-button' => 'Mua Ngay'
    ],
    [
        'slider-title' => 'QUÀ LƯU NIỆM',
        'slider-img' => '../../../accest/img/Slider/slider-3.jpg',
        'slider-desc' => 'Những món quà lưu niệm nên mua khi đi du lịch',
        'slider-button' => 'Mua Ngay'
    ]
];

// Danh sách sản phẩn
$productListAll = GetData($connection->Query('SELECT * FROM product'));

$ProductList = [
    'product-list__feature' => [
        [
            'id' => 4,
            'product-item__name' => 'Kính Mắt',
            'product-item__image' => '../../../accest/img/ProductImg/product-4.jpg',
            'product-item__mark' => 'HOT',
            'product-item__price' => '55'.'$',
            'product-item__assess--rank' => 5
        ],
        [
            'id' => 5,
            'product-item__name' => 'Túi Xách',
            'product-item__image' => '../../../accest/img/ProductImg/product-5.jpg',
            'product-item__mark' => 'HOT',
            'product-item__price' => '114'.'$',
            'product-item__assess--rank' => 4
        ],
        [
            'id' => 5,
            'product-item__name' => 'Đồ chơi xếp gỗ',
            'product-item__image' => '../../../accest/img/ProductImg/product-6.jpg',
            'product-item__mark' => 'HOT',
            'product-item__price' => '15'.'$',
            'product-item__assess--rank' => 3
        ]
    ]
];

// Footer

$companyContact = [
    'phone' => '+84 986209875',
    'email' => 'vietbao2k2@gmail.com',
    'address' => 'Cổ Nhuế 2, Bắc Từ Liêm, Hà Nội',
];