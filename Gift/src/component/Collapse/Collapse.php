<?php

function Collapse($collapseClass, $collapseId, $collapseContent) {
    return '
    <link rel="stylesheet" href="../../Collapse/Collapse.module.css">
    <div class="'.$collapseClass.'-collapse__content w-100 top-0 collapse" id="'.$collapseId.'">
        <div class="'.$collapseClass.'-collapse__header bg-white w-100"></div>
        <div class="'.$collapseClass.'-collapse__text card card-body border-0 rounded-0">
            <div class="container">'.$collapseContent.'</div>
        </div>
    </div>
    <script defer type="module" src="../../Collapse/Collapse.js"></script>
    ';
}