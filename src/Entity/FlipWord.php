<?php


namespace App\Entity;


final class FlipWord implements Flipper
{

    private string $sentence;

    public function __construct(string $sentence)
    {
        $this->sentence = $sentence;
    }

    public function flip(): string
    {
        $arrayWords = explode(self::SEPARATOR, $this->sentence);
        return implode(self::SEPARATOR, array_reverse($arrayWords));
    }
}