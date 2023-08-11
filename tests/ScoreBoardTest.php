<?php
namespace Damian\FootballScoreBoard\Tests;

use Damian\FootballScoreBoard\Exception\RepeatedMatchException;
use PHPUnit\Framework\TestCase;
use Damian\FootballScoreBoard\ScoreBoard;

final class ScoreBoardTest extends TestCase
{
    public function testScoreBoardConstructor() {
        $scoreBoard = new ScoreBoard();
        $this->assertInstanceOf(ScoreBoard::class, $scoreBoard);
    }

    public function testScoreBoardConstructorAndCheckInitializedData() {
        $scoreBoard = new ScoreBoard();
        $this->assertInstanceOf(ScoreBoard::class, $scoreBoard);
        $this->assertEquals(0, $scoreBoard->getGamesCount());
    }

    public function testScoreBoardStartGame() {
        $scoreBoard = new ScoreBoard();
        $id = $scoreBoard->startGame('Mexico', 'Canada');
        $this->assertEquals(1, $scoreBoard->getGamesCount());
        $this->assertEquals($id, $scoreBoard->getGame($id)->id);
    }

    public function testScoreBoardCanNotAddTheSameMatchTwice() {
        $scoreBoard = new ScoreBoard();
        $scoreBoard->startGame('Mexico', 'Canada');
        $this->expectException(RepeatedMatchException::class);
        $scoreBoard->startGame('Mexico', 'Canada');
    }

    public function testScoreBoardCanNotAddTwoMatches() {
        $scoreBoard = new ScoreBoard();
        $scoreBoard->startGame('Mexico', 'Canada');
        $scoreBoard->startGame('Spain', 'Brasil');
        $this->assertEquals(2, $scoreBoard->getGamesCount());
    }

    public function testScoreBoardShowScoreboard() {
        $scoreBoard = new ScoreBoard();
        $scoreBoard->startGame('Mexico', 'Canada');
        $scoreBoard->startGame('Germany', 'France');

        $this->assertEquals("Mexico - Canada: 0 - 0\nGermany - France: 0 - 0", $scoreBoard->__toString());
    }
    public function testScoreBoardFinishGame() {
        $scoreBoard = new ScoreBoard();
        $gameId = $scoreBoard->startGame('Mexico', 'Canada');
        $this->assertEquals(1, $scoreBoard->getGamesCount());

        $scoreBoard->finishGame($gameId);
        $this->assertEquals(0, $scoreBoard->getGamesCount());
    }
    public function testScoreBoardUpdateGame() {
        $scoreBoard = new ScoreBoard();
        $gameId = $scoreBoard->startGame('Mexico', 'Canada');
        $scoreBoard->updateScore($gameId, 1, 2);
        $this->assertEquals("Mexico - Canada: 1 - 2", $scoreBoard->__toString());
    }

    public function testScoreBoardGetBoardSummary() {
        $scoreBoard = new ScoreBoard();
        $gameId = $scoreBoard->startGame('Mexico', 'Canada');
        $gameId2 = $scoreBoard->startGame('Germany', 'France');

        $scoreBoard->updateScore($gameId, 1, 2);
        $scoreBoard->updateScore($gameId2, 5, 2);

        $this->assertEquals("1. Germany - France: 5 - 2\n2. Mexico - Canada: 1 - 2",
            $scoreBoard->getScoreBoardSummary());
    }
}