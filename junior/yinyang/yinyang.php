<?php

class YinYang
{
    public static function run($start, $end)
    {
        for ($number = $start; $number < $end; $number++) {
            if (self::isDivisibleBy3($number) && self::isDivisibleBy5($number)) echo "Yin Yang";
            else if (self::isDivisibleBy3($number)) echo "Yin";
            else if (self::isDivisibleBy5($number)) echo "Yang";
            else echo $number;

            echo "<br />";
        }
    }

    private static function isDivisibleBy3($number) {
        return $number % 3 == 0;
    }
    private static function isDivisibleBy5($number) {
        return $number % 5 == 0;
    }
}


YinYang::run(1, 16);

