<?php

namespace App\Tests\Service;

use App\Entity\FlipType;
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

        $this->assertSame($flipWord, $flipSentence($word, FlipType::createTypeWord()));
    }

    public function testShouldReturnFlipLetterBad()
    {
        $word = 'hola mundo';
        $flipWord = 'odnum aloh';
        $flipSentence = new FlipSentence();

        $this->assertNotSame($flipWord, $flipSentence($word, FlipType::createTypeWord()));
    }

    public function testShouldReturnFlipWordCorrect()
    {
        $word = 'hola mundo';
        $flipWord = 'mundo hola';
        $flipSentence = new FlipSentence();

        $this->assertSame($flipWord, $flipSentence($word, FlipType::createTypeSentence()));
    }

    public function testShouldReturnFlipWordBad()
    {
        $word = 'hola mundo';
        $flipWord = 'odnum aloh';
        $flipSentence = new FlipSentence();

        $this->assertNotSame($flipWord, $flipSentence($word, FlipType::createTypeSentence()));
    }
}
