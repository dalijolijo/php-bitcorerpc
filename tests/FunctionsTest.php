<?php

use Dali\Bitcore;

class FunctionsTest extends TestCase
{
    /**
     * Test satoshi to btc converter.
     *
     * @param int    $satoshi
     * @param string $bitcore
     *
     * @return void
     *
     * @dataProvider satoshiBtcProvider
     */
    public function testToBtc($satoshi, $bitcore)
    {
        $this->assertEquals($bitcore, Bitcore\to_bitcore($satoshi));
    }

    /**
     * Test bitcore to satoshi converter.
     *
     * @param int    $satoshi
     * @param string $bitcore
     *
     * @return void
     *
     * @dataProvider satoshiBtcProvider
     */
    public function testToSatoshi($satoshi, $bitcore)
    {
        $this->assertEquals($satoshi, Bitcore\to_satoshi($bitcore));
    }

    /**
     * Test bitcore to ubtc/bits converter.
     *
     * @param int    $ubtc
     * @param string $bitcore
     *
     * @return void
     *
     * @dataProvider bitsBtcProvider
     */
    public function testToBits($ubtc, $bitcore)
    {
        $this->assertEquals($ubtc, Bitcore\to_ubtc($bitcore));
    }

    /**
     * Test bitcore to mbtc converter.
     *
     * @param float  $mbtc
     * @param string $bitcore
     *
     * @return void
     *
     * @dataProvider mbtcBtcProvider
     */
    public function testToMbtc($mbtc, $bitcore)
    {
        $this->assertEquals($mbtc, Bitcore\to_mbtc($bitcore));
    }

    /**
     * Test float to fixed converter.
     *
     * @param float  $float
     * @param int    $precision
     * @param string $expected
     *
     * @return void
     *
     * @dataProvider floatProvider
     */
    public function testToFixed($float, $precision, $expected)
    {
        $this->assertSame($expected, Bitcore\to_fixed($float, $precision));
    }

    /**
     * Provides satoshi and bitcore values.
     *
     * @return array
     */
    public function satoshiBtcProvider()
    {
        return [
            [1000, '0.00001000'],
            [2500, '0.00002500'],
            [-1000, '-0.00001000'],
            [100000000, '1.00000000'],
            [150000000, '1.50000000'],
        ];
    }

    /**
     * Provides satoshi and ubtc/bits values.
     *
     * @return array
     */
    public function bitsBtcProvider()
    {
        return [
            [10, '0.00001000'],
            [25, '0.00002500'],
            [-10, '-0.00001000'],
            [1000000, '1.00000000'],
            [1500000, '1.50000000'],
        ];
    }

    /**
     * Provides satoshi and mbtc values.
     *
     * @return array
     */
    public function mbtcBtcProvider()
    {
        return [
            [0.01, '0.00001000'],
            [0.025, '0.00002500'],
            [-0.01, '-0.00001000'],
            [1000, '1.00000000'],
            [1500, '1.50000000'],
        ];
    }

    /**
     * Provides float values with precision and result.
     *
     * @return array
     */
    public function floatProvider()
    {
        return [
            [1.2345678910, 0, '1'],
            [1.2345678910, 2, '1.23'],
            [1.2345678910, 4, '1.2345'],
            [1.2345678910, 8, '1.23456789'],
        ];
    }
}
