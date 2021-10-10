<?php
/**
 * ----------------------------------------
 * author : Mahmut ÖZDEMİR
 * web    : www.mahmutozdemir.com.tr
 * email  : bilgi@mahmutozdemir.com.tr
 * ----------------------------------------
 * Date   : 2021-10-11 00:59
 * File   : CouponGenerator.php
 */

namespace Mahmut\CouponGenerator;

use Mahmut\CouponGenerator\Option\Option;

class CouponGenerator
{
    /**
     * uppercase letters
     *
     * @var string[]
     */
    private $ucLetters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];

    /**
     * lowercase letters
     *
     * @var string[]
     */
    private $lcLetters = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];

    /**
     * numbers
     *
     * @var int[]
     */
    private $numbers = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];

    /**
     * symbols
     * @var string[]
     */
    private $symbols = ['@', '#', '$', '-', '%', '^', '&', '*', '_', '+', ';', ':', '.', '?', ',', '='];

    /**
     * number of coupons
     *
     * @var int
     */
    private $numberOfCoupons = 1;

    /**
     * @var Option
     */
    private $option;

    /**
     * character list for generate coupon code
     *
     * @var array
     */
    private $characters = [];

    /**
     * coupons
     *
     * @var array
     */
    private $coupons = [];

    /**
     * CouponGenerator constructor.
     *
     * @param Option $option
     */
    public function __construct(Option $option)
    {
        $this->option = $option;

        if($option->isUseLetters()){
            $this->characters = $option->isUseMixedCase() ? array_merge($this->characters, $this->ucLetters, $this->lcLetters) : array_merge($this->characters, $this->ucLetters);
        }

        if($option->isUseNumbers()){
            $this->characters = array_merge($this->characters, $this->numbers);
        }

        if($option->isUseSymbols()){
            $this->characters = array_merge($this->characters, $this->symbols);
        }
    }

    /**
     * coupon code
     *
     * @return string
     */
    private function coupon()
    {
        $coupon = '';

        if($mask = $this->option->getMask()){
            for($i = 0; $i < mb_strlen($mask); $i++){
                if($mask[$i] === 'X'){
                    $coupon .= $this->characters[mt_rand(0, count($this->characters) - 1)];
                } else {
                    $coupon .= $mask[$i];
                }
            }
        } else {
            for($i = 0; $i < $this->option->getLength(); $i++){
                $coupon .= $this->characters[mt_rand(0, count($this->characters) - 1)];
            }
        }

        return $this->option->getPrefix().$coupon.$this->option->getSuffix();
    }

    /**
     * generate coupons
     *
     * @return $this
     */
    public function generate()
    {
        $coupons = [];
        for($i = 0; $i < $this->numberOfCoupons; $i++){
            $coupons[] = $this->coupon();
        }

        $this->coupons = $coupons;
        return $this;
    }

    /**
     * get coupon codes
     *
     * @return array
     */
    public function getCoupons()
    {
        return $this->coupons;
    }

    /**
     * get number of coupons
     *
     * @return int
     */
    public function getNumberOfCoupons()
    {
        return $this->numberOfCoupons;
    }

    /**
     * @param int $numberOfCoupons
     * @return CouponGenerator
     */
    public function setNumberOfCoupons($numberOfCoupons)
    {
        $this->numberOfCoupons = $numberOfCoupons;
        return $this;
    }
}