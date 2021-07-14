<?php


namespace App\Service;

use DomainException;
use App\Entity\FlipType;

final class FlipSentence
{
    private const SEPARATOR = ' ';

    public function __invoke(string $sentence, FlipType $flipType): string
    {
        if (true === $flipType->isTypeWord()) {
            return $this->flipLetters($sentence);
        }
        if (true === $flipType->isTypeSentence()) {
            return $this->flipWords($sentence);
        }
        throw new DomainException();
    }

    private function flipLetters(string $sentence): string
    {
        $arrayWords = explode(self::SEPARATOR, $sentence);
        $flipSentence = '';
        foreach ($arrayWords as $word) {
            $flipSentence .= strrev($word) . self::SEPARATOR;
        }
        return trim($flipSentence);
    }

    private function flipWords(string $sentence): string
    {
        $arrayWords = explode(self::SEPARATOR, $sentence);
        return implode(self::SEPARATOR, array_reverse($arrayWords));
    }


}