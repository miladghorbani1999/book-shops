<?php


use Morilog\Jalali\Jalalian;

function jalali_date($datetime): ?string{
    if (!$datetime) return null;
    return jdate($datetime)->format('j F Y');
}

function jalali_date_format2($datetime): ?string{
    if (!$datetime) return null;
    return jdate($datetime)->format('Y/m/d');
}

function jalali_to_georgian(string $datetime): ?string{
    return Jalalian::fromFormat('Y/m/d', $datetime)->toCarbon()->format('Y-m-d');

}
