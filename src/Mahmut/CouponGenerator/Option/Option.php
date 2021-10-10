<?php
/**
 * ----------------------------------------
 * author : Mahmut ÖZDEMİR
 * web    : www.mahmutozdemir.com.tr
 * email  : bilgi@mahmutozdemir.com.tr
 * ----------------------------------------
 * Date   : 2021-10-11 01:04
 * File   : Option.php
 */

namespace Mahmut\CouponGenerator\Option;

class Option
{
    /**
     * coupon length
     * @var int
     */
    private $length = 10;

    /**
     * coupon prefix
     *
     * @var string
     */
    private $prefix;

    /**
     * coupon suffix
     * @var string
     */
    private $suffix;

    /**
     * use letters on coupon
     * @var bool
     */
    private $useLetters = true;

    /**
     * use numbers on coupon
     *
     * @var bool
     */
    private $useNumbers = true;

    /**
     * use symbols on coupon
     * @var bool
     */
    private $useSymbols = false;

    /**
     * use lowercase and uppercase letters
     *
     * @var bool
     */
    private $useMixedCase = false;

    /**
     * coupon code mask
     *
     * @var string
     */
    private $mask;

    /**
     * Option constructor.
     */
    public function __construct() {}

    /**
     * @return int
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param int $length
     * @return Option
     */
    public function setLength($length)
    {
        $this->length = $length;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrefix()
    {
        return $this->prefix;
    }

    /**
     * @param string $prefix
     * @return Option
     */
    public function setPrefix($prefix)
    {
        $this->prefix = $this->clean($prefix);
        return $this;
    }

    /**
     * @return string
     */
    public function getSuffix()
    {
        return $this->suffix;
    }

    /**
     * @param string $suffix
     * @return Option
     */
    public function setSuffix($suffix)
    {
        $this->suffix = $this->clean($suffix);
        return $this;
    }

    /**
     * @return bool
     */
    public function isUseLetters()
    {
        return $this->useLetters;
    }

    /**
     * @param bool $useLetters
     * @return Option
     */
    public function setUseLetters($useLetters)
    {
        $this->useLetters = $useLetters;
        return $this;
    }

    /**
     * @return bool
     */
    public function isUseNumbers()
    {
        return $this->useNumbers;
    }

    /**
     * @param bool $useNumbers
     * @return Option
     */
    public function setUseNumbers($useNumbers)
    {
        $this->useNumbers = $useNumbers;
        return $this;
    }

    /**
     * @return bool
     */
    public function isUseSymbols()
    {
        return $this->useSymbols;
    }

    /**
     * @param bool $useSymbols
     * @return Option
     */
    public function setUseSymbols($useSymbols)
    {
        $this->useSymbols = $useSymbols;
        return $this;
    }

    /**
     * @return bool
     */
    public function isUseMixedCase()
    {
        return $this->useMixedCase;
    }

    /**
     * @param bool $useMixedCase
     * @return Option
     */
    public function setUseMixedCase($useMixedCase)
    {
        $this->useMixedCase = $useMixedCase;
        return $this;
    }

    /**
     * @return string
     */
    public function getMask()
    {
        return $this->mask;
    }

    /**
     * @param string $mask
     * @return Option
     */
    public function setMask($mask)
    {
        $this->mask = $mask;
        return $this;
    }

    /**
     * clean
     *
     * @param $string
     * @return string|string[]|null
     */
    private function clean($string)
    {
        $string = preg_replace('/[^a-zA-Z0-9\-]/', '', trim($string));
        return $string;
    }
}