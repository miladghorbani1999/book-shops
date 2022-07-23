<?php


use Morilog\Jalali\Jalalian;

if (!function_exists('jalali')) {
    function jalali(string $datetime):?Jalalian
    {
        return jdate($datetime);
    }

    if (function_exists('jalali_date_format2')) {
        function jalali_date(string $datetime): string
        {
            return jalali($datetime)->format('j F Y');
        }
    }

    if (function_exists('jalali_date_format2')) {
        function jalali_date_format2(string $datetime): string
        {
            return jdate($datetime)->format('Y/m/d');
        }
    }

}
function jalali_to_solar(string $datetime): ?string
{
    return Jalalian::fromFormat('Y/m/d', $datetime)->toCarbon()->format('Y-m-d');
}

