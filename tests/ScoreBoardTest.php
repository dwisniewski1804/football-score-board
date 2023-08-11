<?php
namespace Damian\FootballScoreBoard\Tests;

use PHPUnit\Framework\TestCase;
use Damian\FootballScoreBoard\ScoreBoard;

final class ScoreBoardTest extends TestCase
{
    public function testScoreBoardConstructor() {
        $scoreBoard = new ScoreBoard();
        $this->assertInstanceOf(ScoreBoard::class, $scoreBoard);
    }
}