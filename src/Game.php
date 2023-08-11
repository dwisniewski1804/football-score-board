<?php

namespace Damian\FootballScoreBoard;

use Doctrine\Common\Collections\ArrayCollection;

class Game
{
    public readonly string $id;
    public readonly Team $home;

    public readonly Team $away;
    private int $homeResult;
    private int $awayResult;

    private const TEAM_DIVIDER = ' - ';
    public function __construct(string $home, string $away)
    {
        $this->id = uniqid();
        $this->home = new Team($home);
        $this->away = new Team($away);
        $this->homeResult = 0;
        $this->awayResult = 0;
    }

    public function startGame(string $home, string $away) {
        $this->games = new Game();
    }

    public function updateScore(int $home, int $away) {
        $this->homeResult = $home;
        $this->awayResult = $away;
    }

    public function getFormattedResult() {
        return $this->home . self::TEAM_DIVIDER . $this->away . ': '
            . $this->homeResult . self::TEAM_DIVIDER . $this->awayResult;
    }
}