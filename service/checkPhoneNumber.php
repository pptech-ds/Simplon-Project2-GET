<?php

function checkPhoneNumber($number): bool
{
    $check = false;

    if (strlen($number) == 10) {
        $check = true;
    }

    return $check;
}
