<?php

namespace Damian\FootballScoreBoard;

class Team
{
    public readonly string $name;

    public function __construct(string $name) {
        $this->name = $name;
    }

    public function __toString() {
        return $this->name;
    }
}