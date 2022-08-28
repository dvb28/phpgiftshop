<?php

function Product($styled , $productItem) {
    $asessStarList = [];
    // Render Star
    for($i = 0; $i < $productItem['View']; $i++) {
        $asessStar = '
            <i class="text-warning bi bi-star-fill"></i>
        ';
        array_push($asessStarList, $asessStar); 
    }
    if(count($asessStarList) < 5) {
        for($t = 0; $t < count($asessStarList); $t++) {
            array_unshift($asessStarList, '<i class="bi bi-star"></i>'); 
            if(count($asessStarList) == 5) {
                break;
            }
        }
    }
    $asessStarString = implode('' ,$asessStarList);
    $asessStarHTML = '
        <div class="product-item__assess">
            '.$asessStarString.'
        </div>
    ';
    $productAction = '
        <div href="#" class="product-item__hover--filter">
            <div class="product--item__hover--action">
                <i class="product-heart__btn product-action__icon bi bi-suit-heart-fill cs-pt" data-bs-toggle="tooltip"></i>
                <i class="product-cart__btn product-action__icon bi bi-cart-plus-fill cs-pt" data-bs-toggle="tooltip"></i>
                <i class="product-info__btn product-action__icon bi bi-info-lg cs-pt" data-bs-toggle="tooltip"></i>
            </div>
        </div>
    ';
    if($styled == 'feature') {
        $productItemText = '
            <div class="product-item__text">
                <div class="product-item__name defaultAnimation">'.$productItem['Name'].'</div>
                <div class="product-item__price">'.$productItem['Price'].'</div>
            </div>
        ';
        $productActionHTML = '
            '.$productAction.'
            '.$asessStarHTML.'
        ';
        $productFeatureHTML = '';
    } else if($styled == 'all'){
        $productFeature = '';
        $productItemText = '
            <div class="product-item__text">
                <div class="product-item__name defaultAnimation">'.$productItem['Name'].'</div>
            </div>
            <div class="product-item__price-and-assess">
                <div class="product-item__price">'.$productItem['Price'].'</div>
                '.$asessStarHTML.'
            </div>
        ';
        $productActionHTML = '
            '.$productAction.'
        ';
    }
    empty($productItem['View']) ? $productMark = '' : $productMark = '<div class="product-item__mark disabled">'.strtoupper($productItem['View']).'</div>';
    $productHTML = '
            <div href="../ProductInfo/ProductInfo.php" class="'.$styled.'-style product-item draw meet">
                '.$productMark.'
                '.$productActionHTML.'
                <div class="product-item__img-background">
                    <img class="product-item__img" src="'.$productItem['ImageLink'].'" alt="">
                </div>
                '.$productItemText.'
                <div style="width: 0; height: 0" class="product-id invisible">'.$productItem['ID'].'</div>
            </div>
        ';
    return $productHTML;
}