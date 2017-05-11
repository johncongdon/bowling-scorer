<?php

ini_set('display_errors', 'on');

class ScoringTest extends PHPUnit_Framework_TestCase
{
    public function testCanInstantiateScorer()
    {
        $scorer = new BowlingScorer();
        $this->assertTrue(is_object($scorer));
    }

    public function testCanInstantiateFrame()
    {
        $frame = new BowlingFrame();
        $this->assertTrue(is_object($frame));
    }

    public function testCanGetFrameTotal()
    {
        $frame = new BowlingFrame();
        $frame_total = $frame->getTotal();
        $this->assertEquals(0, $frame_total);
    }

    public function testCanAddRolledScoreToGame()
    {
        $scorer = new BowlingScorer();
        $scorer->addRoll(5);
        $scorer->addRoll(3);

        $this->assertEquals(8, $scorer->getTotal());
    }

    public function testCanAddMultipleRolledFramesToGame()
    {
        $scorer = new BowlingScorer();
        $scorer->addRoll(5);
        $scorer->addRoll(3);
        $scorer->addRoll(5);
        $scorer->addRoll(3);

        $this->assertEquals(16, $scorer->getTotal());
    }
}