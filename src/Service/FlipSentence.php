<?php


namespace App\Service;

use App\Entity\Flipper;

final class FlipSentence
{
    public function __invoke(Flipper $flipper): string
    {
        return $flipper->flip();
    }

}