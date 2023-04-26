<?php

function inputFields($name, $value, $type) {
    $elem = "<div>
                <label for=\"'$name'\">" . $name . "</label>
                <input type='$type' id='$' name='$name' value='$value' autocomplete=\"off\">
            </div>";
    echo $elem;
}