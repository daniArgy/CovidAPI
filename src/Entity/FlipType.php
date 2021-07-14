<?php


namespace App\Entity;


final class FlipType
{
    private const TYPE_WORD = 'Word';
    private const TYPE_SENTENCE = 'Sentence';

    private string $type;

    public static function createTypeWord() : self
    {
        return new self(self::TYPE_WORD);
    }

    public static function createTypeSentence() : self
    {
        return new self(self::TYPE_SENTENCE);
    }

    private function __construct(string $type)
    {
        $this->type = $type;
    }

    public function isTypeWord(): bool
    {
        return self::TYPE_WORD === $this->type;
    }

    public function isTypeSentence(): bool
    {
        return self::TYPE_SENTENCE === $this->type;
    }
}