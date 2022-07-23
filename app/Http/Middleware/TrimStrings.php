<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;

class TrimStrings extends Middleware
{
    /**
     * The names of the attributes that should not be trimmed.
     *
     * @var array<int, string>
     */
    protected $except = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    protected function transform($key, $value)
    {
        if (in_array($key, $this->except, true)) {
            return $value;
        }
        $value = $this->convertNumbers($value);
        return is_string($value) ? trim($value) : $value;
    }

    protected function convertNumbers(string $string): array|string
    {
        $newNumbers = range(0, 9);
        // 1. Persian HTML decimal
        $persianDecimal = ['&#1776;', '&#1777;', '&#1778;', '&#1779;', '&#1780;', '&#1781;', '&#1782;', '&#1783;', '&#1784;', '&#1785;'];
        // 2. Arabic HTML decimal
        $arabicDecimal = ['&#1632;', '&#1633;', '&#1634;', '&#1635;', '&#1636;', '&#1637;', '&#1638;', '&#1639;', '&#1640;', '&#1641;'];
        // 3. Arabic Numeric
        $arabic = ['٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩'];
        // 4. Persian Numeric
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];

        $string =  str_replace($persianDecimal, $newNumbers, $string);
        $string =  str_replace($arabicDecimal, $newNumbers, $string);
        $string =  str_replace($arabic, $newNumbers, $string);
        return str_replace($persian, $newNumbers, $string);
    }

    protected function cleanValue($key, $value)
    {
        if (! is_string($value)) {
            return parent::cleanValue($key, $value);
        }

        $isMobile = preg_match('/^(\+98|0)?9\d{9}$/', $value);

        $mobileInputs = [
            'mobile',
            'username',
            'user.mobile',
        ];

        if (in_array($key, $mobileInputs, true) && $isMobile) {
            return $this->transform($key, preg_replace('/^(\+98|0)?9(\d{9})$/', '9$2', $value));
        }

        return parent::cleanValue($key, $value);
    }
}
