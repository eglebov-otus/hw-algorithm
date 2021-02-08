<?php

namespace Main;

class Strings implements TaskInterface
{
    public function run(string $input): string
    {
        return strlen($input);
    }
}