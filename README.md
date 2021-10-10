# PHP Coupon Code Generator

## Installation
```sh
composer require mahmut/coupon-generator
```

## Example
```php
$option = (new \Mahmut\CouponGenerator\Option\Option())
    ->setLength(10) // default is 10
    ->setPrefix('ABC-') // coupon prefix. ABC-XXXXX
    ->setSuffix('-XYZ') // coupon suffix XXXX-XYZ
    ->setUseLetters(true) // use letters. default is true
    ->setUseNumbers(true) // use numbers. default is true
    ->setUseSymbols(false) // use symbols. default is false
    ->setUseMixedCase(false) // use mixed cases. default is false
    ->setMask('XXXXXX'); // coupon mask. length is ignores

$coupons = (new \Mahmut\CouponGenerator\CouponGenerator($option))
    ->setNumberOfCoupons(100) // number of coupons to be created
    ->generate()
    ->getCoupons();
```

## Result
```php
Array
(
    [0] => OND53E6MRM
    [1] => LS54Q5SWYM
    [2] => EFZDXHQ5RQ
    [3] => 8HBNTW50Q4
    [4] => YK9G6XRHMN
    [5] => ZY4NVMN08G
    [6] => 6T4ITO2YKU
    [7] => AADP4FGDI3
    [8] => J5U68IZJ22
    [9] => NCRA06AEGU
)
```