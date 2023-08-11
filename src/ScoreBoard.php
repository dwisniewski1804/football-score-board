<?php

namespace Damian\FootballScoreBoard;

use Damian\FootballScoreBoard\Exception\RepeatedMatchException;
use Doctrine\Common\Collections\ArrayCollection;

class ScoreBoard
{
    private ArrayCollection $games;
    public function __construct()
    {
        $this->games = new ArrayCollection;
    }

    public function getGamesCount(): int {
        return $this->games->count();
    }

    public function getGame(string $id): Game|bool {
        return $this->games->filter(
            function($game) use ($id) {
                return $game->id === $id;
            }
        )->first();
    }

    private function getGameByTeams(string $home, string $away): Game|bool {
        return $this->games->filter(
            function($game) use ($home, $away) {
                return $game->home->name === $home && $game->away->name === $away;
            }
        )->first();
    }
    public function startGame(string $home, string $away): string {

        if ($this->getGameByTeams($home, $away)) {
            throw new RepeatedMatchException();
        }
        $game = new Game($home, $away);
        $this->games->add($game);

        return $game->id;
    }

    public function finishGame(string $id): void {
        $game = $this->getGame($id);
        $key = $this->games->indexOf($game);
        $this->games->remove($key);
    }

    public function updateScore(string $id, int $home, int $away): self {
        $this->getGame($id)->updateScore($home, $away);

        return $this;
    }

    // this function does not sort and do not have ordinal number (just for tests for now)
    public function __toString(): string
    {
        $result = '';
        foreach ($this->games as $key => $game) {
            $result .= $game->getFormattedResult()
            . ($key === ($this->games->count() - 1) ? '' : PHP_EOL);
        }

        return $result;
    }

    public function getScoreBoardSummary(): string {
        $gamesSorted = array_reverse($this->games->toArray());
        $result = '';
        foreach ($gamesSorted as $key => $game) {
            $result .= ($key + 1). '. ' . $game->getFormattedResult()
                . ($key === ($this->games->count() - 1) ? '' : PHP_EOL);
        }

        return $result;
    }
}