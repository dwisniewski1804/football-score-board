<?php

use PHPUnit\Framework\TestCase;
use Damian\FootballScoreBoard\Game;
use Damian\FootballScoreBoard\Team;
final class GameTest extends TestCase
{
    public function testGameConstructor() {
        $game = new Game('Brasil', 'Mexico');
        $this->assertInstanceOf(Game::class, $game);
        $this->assertInstanceOf(Team::class, $game->home);
        $this->assertInstanceOf(Team::class, $game->away);
        $this->assertIsString($game->id);
    }

    public function testInitialScore() {
        $game = new Game('Brasil', 'Mexico');
        $this->assertEquals('Brasil', $game->home->name);
        $this->assertEquals('Mexico', $game->away->name);
        $this->assertEquals('Brasil - Mexico: 0 - 0', $game->getFormattedResult());
    }

    public function testUpdateScore() {
        $game = new Game('Brasil', 'Mexico');
        $game->updateScore(1, 2);
        $this->assertEquals('Brasil - Mexico: 1 - 2', $game->getFormattedResult());
    }
}