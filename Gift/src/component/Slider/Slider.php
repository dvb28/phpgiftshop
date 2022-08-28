<?php

function Slider($sliderList) {
    $sliderSlideList = [];
    $sliderItemList = [];
    $sliderSlideItem;
    for($i = 0; $i < count($sliderList); $i++) {
        if($i == 0) {
            $sliderSlideItem = '
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="'.$i.'" class="active" aria-current="true" aria-label="Slide '.$i.'"></button>
            ';
        } else {
            $sliderSlideItem = '
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="'.$i.'" aria-current="true" aria-label="Slide '.$i.'"></button>
            ';
        }
        array_push($sliderSlideList, $sliderSlideItem);
    }
    $sliderSlideItemHTML = implode('', $sliderSlideList);
    $isActive;
    foreach($sliderList as $item) {
        if($item == $sliderList[0]) {
            $isActive = 'active';
        } else {
            $isActive = '';
        }
        $sliderItem = '
            <div class="carousel-item '.$isActive.'" data-bs-interval="2000">
                <img src="'.$item['slider-img'].'" class="d-inline w-100" alt="Slide 1">
                <div class="slider-title text-nowrap pt-3 d-md-inline">
                    <div class="fadeInRight">
                        <h5 class="slider-primary-text w-50">'.$item['slider-title'].'</h5>
                        <p class="slider-sub-text">'.$item['slider-desc'].'</p>
                        <button class="slider-button button button--default button--theme-light">
                            <span class="button__text">'.$item['slider-button'].'</span>
                            <span class="button__arrow">
                                <span class="button__arrow-chevron"></span>
                                <span class="button__arrow-line"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        ';
        array_push($sliderItemList, $sliderItem);
    }
    $sliderItemHTML = implode('', $sliderItemList);
    return '
    <link rel="stylesheet" href="../../Slider/Slider.module.css">
    <div id="slider" class="container slider position-relative overflow-hidden">
        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-indicators">
                '.$sliderSlideItemHTML.'
            </div>
            <div class="carousel-inner position-relative">
                '.$sliderItemHTML.'
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    ';
}