<?php

namespace Main;

interface TaskInterface {
    public function run(string $input): string;
}
