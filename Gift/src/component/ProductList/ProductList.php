<?php

function ProductList($styled , $productList) {
    $FeatureList = [];
    $ProductString = [];
    foreach($productList as $ProductItem) {
        if($styled == 'feature') {
            $Col = "col-lg-4 col-sm-12";
            $ProductListTitle = 'SẢN PHẨM NỔI BẬT';
        } else if($styled == 'all') {
            $Col = "load-more col-lg-3 col-md-4 col-sm-6 col-12";
            $ProductListTitle = 'TẤT CẢ SẢN PHẨM';
        }
        $ProductString = Product($styled , $ProductItem);
        $ProductHTML = '
            <div class="'.$Col.'">
                <div>
                    '.$ProductString.'
                </div>
            </div>
        ';
        array_push($FeatureList, $ProductHTML);
    }
    $FeatureString = implode('', $FeatureList);
    return '
        <link rel="stylesheet" href="../../Product/Product.module.css">
        <link rel="stylesheet" href="../../ProductList/ProductList.module.css">
        <script defer src="../../../../node_modules/simple-load-more/jquery.simpleLoadMore.js"></script>
        <script defer type="module" src="../../Product/Product.js"></script>
        <script defer type="module" src="../../ProductList/ProductList.js"></script>
        <div id="product-list" class="container product-list">
            <div id="product-list-title" class="product-list__title text-center fs-4">'.$ProductListTitle.'</div>
            <div class="'.$styled.'-row row d-flex">
                '.$FeatureString.'
            </div>
        </div>
    ';
}