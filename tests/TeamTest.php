<?php

use Damian\FootballScoreBoard\Team;
use PHPUnit\Framework\TestCase;
use Damian\FootballScoreBoard\Game;

final class TeamTest extends TestCase
{
    public function testTeamConstructor() {
        $team = new Team('Brasil');
        $this->assertInstanceOf(Team::class, $team);
        $this->assertEquals('Brasil', $team->name);
    }

}