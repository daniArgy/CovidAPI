<?php

namespace App\Entity;

interface Flipper
{
    const SEPARATOR = ' ';

    public function flip(): string;
}