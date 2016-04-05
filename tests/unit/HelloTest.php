<?php
/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 05.04.16
 * Time: 14:06
 */
use app\commands;

//use app\models\Books;

class HelloTest extends PHPUnit_Framework_TestCase{

    public function testCyrillic(){

       $message = 'Привет';

        $cyrillic = preg_match('/[А-Яа-яЁё]/u', $message);

        $this->assertEquals(1,$cyrillic);

    }

    public function testReverse(){

        $message = 'Hello';

        $expected = 'olleH';

        $this->assertEquals($expected, strrev($message));

    }

    public function testRemovingVowels(){

        $input = 'Hello';

        $expected = 'Hll';

        $this->assertEquals($expected,  preg_replace('/([aeiou])/i', '', $input));

    }
}