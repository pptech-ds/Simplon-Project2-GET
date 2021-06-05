<?php

function printNotation($points): string
{
    $starsAndCircles = '';
    for ($i = 1; $i <= 5; $i++) {
        if ($i <= $points) {
            $starsAndCircles .= '⭐';
        } else {
            $starsAndCircles .= '⚫';
        }
    }

    return $starsAndCircles;
}
