<?php
function correctPhoneNumber(string $number): string
{
    $number = substr_replace($number, '', -1);

    return $number;
}
