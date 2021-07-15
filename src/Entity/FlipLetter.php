<?php


namespace App\Entity;


final class FlipLetter implements Flipper
{

    private string $sentence;

    public function __construct(string $sentence)
    {
        $this->sentence = $sentence;
    }

    public function flip(): string
    {
        $arrayWords = explode(self::SEPARATOR, $this->sentence);
        $flipSentence = '';
        foreach ($arrayWords as $word) {
            $flipSentence .= strrev($word) . self::SEPARATOR;
        }
        return trim($flipSentence);
    }
}