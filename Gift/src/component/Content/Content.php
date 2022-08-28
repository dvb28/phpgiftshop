<?php

function Content(...$component) {
    $ContentHTML;
    $ContentHTML = implode('', $component);
    return '
        <div id="content">
            '.$ContentHTML.'
        </div>
    ';
}