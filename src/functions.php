<?php

namespace Dali\Bitcore;

if (!function_exists('to_bitcore')) {
    /**
     * Converts from satoshi to bitcore.
     *
     * @param int $satoshi
     *
     * @return string
     */
    function to_bitcore($satoshi)
    {
        return bcdiv((int) $satoshi, 1e8, 8);
    }
}

if (!function_exists('to_satoshi')) {
    /**
     * Converts from bitcore to satoshi.
     *
     * @param float $bitcore
     *
     * @return string
     */
    function to_satoshi($bitcore)
    {
        return bcmul(to_fixed($bitcore, 8), 1e8);
    }
}

if (!function_exists('to_ubtc')) {
    /**
     * Converts from bitcore to ubtc/bits.
     *
     * @param float $bitcore
     *
     * @return string
     */
    function to_ubtc($bitcore)
    {
        return bcmul(to_fixed($bitcore, 8), 1e6, 4);
    }
}

if (!function_exists('to_mbtc')) {
    /**
     * Converts from bitcore to mbtc.
     *
     * @param float $bitcore
     *
     * @return string
     */
    function to_mbtc($bitcore)
    {
        return bcmul(to_fixed($bitcore, 8), 1e3, 4);
    }
}

if (!function_exists('to_fixed')) {
    /**
     * Brings number to fixed precision without rounding.
     *
     * @param float $number
     * @param int   $precision
     *
     * @return string
     */
    function to_fixed($number, $precision = 8)
    {
        $number = $number * pow(10, $precision);

        return bcdiv($number, pow(10, $precision), $precision);
    }
}
