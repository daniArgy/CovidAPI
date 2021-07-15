<?php

namespace App\Tests\Service;

use App\Entity\FlipLetter;
use App\Entity\FlipWord;
use App\Service\FlipSentence;
use PHPUnit\Framework\TestCase;

class FlipSentenceTest extends TestCase
{

    public function test__invoke()
    {
        $this->expectError();
        $flipSentence = new FlipSentence();
        $flipSentence();
    }

    public function testShouldReturnFlipLetterCorrect()
    {
        $word = 'hola';
        $flipWord = 'aloh';
        $flipSentence = new FlipSentence();

        $this->assertSame($flipWord, $flipSentence(new FlipLetter($word)));
    }

    public function testShouldReturnFlipLetterBad()
    {
        $word = 'hola mundo';
        $flipWord = 'odnum aloh';
        $flipSentence = new FlipSentence();

        $this->assertNotSame($flipWord, $flipSentence(new FlipLetter($word)));
    }

    public function testShouldReturnFlipWordCorrect()
    {
        $word = 'hola mundo';
        $flipWord = 'mundo hola';
        $flipSentence = new FlipSentence();

        $this->assertSame($flipWord, $flipSentence(new FlipWord($word)));
    }

    public function testShouldReturnFlipWordBad()
    {
        $word = 'hola mundo';
        $flipWord = 'odnum aloh';
        $flipSentence = new FlipSentence();

        $this->assertNotSame($flipWord, $flipSentence(new FlipWord($word)));
    }
}
