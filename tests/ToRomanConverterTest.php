<?php
declare(strict_types=1);
require_once __DIR__.'/../src/ToRomanConverter.php';

use PHPUnit\Framework\TestCase;

final class ToRomanConverterTest extends TestCase
{
    /**
     * @dataProvider getNumbers()
     */
    public function testToRoman(int $number, string $value): void
    {
        self::assertEquals($value, ToRomanConverter::toRoman($number), \sprintf('Number %d', $number));
    }

    public function testToRomanException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        ToRomanConverter::toRoman(-\mt_rand(0, 100));
    }

    /**
     * @dataProvider getNumbers()
     */
    public function testToNumber(int $number, string $roman): void
    {
        self::assertEquals($number, ToRomanConverter::toDigit($roman), \sprintf('Number %d', $number));
    }

    public function testToNumberException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        ToRomanConverter::toDigit('O');
    }

    public function getNumbers(): array
    {
        return [
            [1, 'I'],
            [2, 'II'],
            [3, 'III'],
            [3, 'III'],
            [4, 'IV'],
            [5, 'V'],
            [6, 'VI'],
            [9, 'IX'],
            [10, 'X'],
            [11, 'XI'],
            [18, 'XVIII'],
            [19, 'XIX'],
            [20, 'XX'],
            [44, 'XLIV'],
            [49, 'XLIX'],
            [50, 'L'],
            [93, 'XCIII'],
            [95, 'XCV'],
            [100, 'C'],
            [104, 'CIV'],
            [109, 'CIX'],
            [149, 'CXLIX'],
            [501, 'DI'],
            [1401, 'MCDI'],
            [1501, 'MDI'],
            [1801, 'MDCCCI'],
            [900, 'CM'],
        ];
    }
}
