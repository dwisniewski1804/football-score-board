<?php

namespace Damian\FootballScoreBoard\Exception;

class RepeatedMatchException extends \Exception
{
    protected $message = 'Match already exists on the scoreboard.';
}