<?php declare(strict_types=1);

final class ToRomanConverter
{
    private const VALUES = [
        'M' => 1000,
        'CM' => 900,
        'D' => 500,
        'CD' => 400,
        'C' => 100,
        'XC' => 90,
        'L' => 50,
        'XL' => 40,
        'X' => 10,
        'IX' => 9,
        'V' => 5,
        'IV' => 4,
        'I' => 1,
    ];

    public static function newConvert(int $num): string
    {
        $string = '';
        foreach (self::VALUES as $roman => $number) {
            $matches = \intval($num / $number);
            $string .= \str_repeat($roman, $matches);
            $num = $num % $number;
        }

        return $string;
    }

    public static function convert(int $a): string
    {
        $result = '';
        $s = $a.'';
        $b = $s[0];
        if ($b === '9') {
            $result .= 'C';
            $a += 100;
        }
        if (($count = intdiv($a, 1000)) > 0) {
            do {
                $result .= 'M';
                $a -= 1000;
                $count--;
            } while ($count > 0);
        }
        $s = $a.'';
        $b = $s[0];
        if ($b === '4') {
            $result .= 'C';
            $a += 100;
        }
        if (($count = intdiv($a, 500)) > 0) {
            do {
                $result .= 'D';
                $a -= 500;
                $count--;
            } while ($count > 0);
        }
        if (($count = intdiv($a, 100)) > 0) {
            do {
                $result .= 'C';
                $a -= 100;
                $count--;
            } while ($count > 0);
        }
        $s = $a.'';
        $b = $s[0];
        if ($b === '4') {
            $result .= 'X';
            $a += 10;
        }
        if (($count = intdiv($a, 50)) > 0) {
            do {
                $result .= 'L';
                $a -= 50;
                $count--;
            } while ($count > 0);
        }
        $s = $a.'';
        $b = $s[0];
        if ($b === '9') {
            $result .= 'I';
            $a += 1;
        }
        if (($count = intdiv($a, 10)) > 0) {
            do {
                $result .= 'X';
                $a -= 10;
                $count--;
            } while ($count > 0);
        }
        $s = $a.'';
        $b = $s[0];
        if ($b === '4') {
            $result .= 'I';
            $a += 1;
        }
        if (($count = intdiv($a, 5)) > 0) {
            do {
                $result .= 'V';
                $a -= 5;
                $count--;
            } while ($count > 0);
        }
        if (($count = intdiv($a, 1)) > 0) {
            do {
                $result .= 'I';
                $a -= 1;
                $count--;
            } while ($count > 0);
        }

        return $result;
    }
}