<?php
// Include
include('../../Stogare/Stogare.php');
function Component(...$component) {
    foreach($component as $item) {
        include('../../'.$item.'/'.$item.'.php');
    }
}