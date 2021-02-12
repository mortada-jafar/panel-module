<?php


function hideElement($el)
{
    return <<<JS
            $("$el").hide();
    JS;
}

function when($cond, $func)
{
    $exe = $func();
    return <<<JS
            if ($cond){
                    $exe
            }

    JS;
}

function otherwise($func)
{
    $exe = $func();
    return <<<JS
            else{
                    $exe
            }

    JS;
}

function showElement($el)
{
    return <<<JS
            $("$el").show();
    JS;
}
