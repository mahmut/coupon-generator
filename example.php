<?php
/**
 * ----------------------------------------
 * author : [not]
 * web    : [not]
 * email  : [not]
 * ----------------------------------------
 * Date   : 2021-10-11 02:00
 * File   : example.php
 */

require_once 'vendor/autoload.php';

$option = (new \Mahmut\CouponGenerator\Option\Option())
    ->setLength(10);

$coupons = (new \Mahmut\CouponGenerator\CouponGenerator($option))
    ->setNumberOfCoupons(10)
    ->generate()
    ->getCoupons();

print_r($coupons);
exit;