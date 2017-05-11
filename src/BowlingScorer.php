<?php

class BowlingScorer
{
    /** @var BowlingFrame[] */
    protected $frames = [];

    public function addRoll($pins)
    {
        $frame = array_pop($this->frames);

        if ( ! is_object($frame)) {
            $frame = new BowlingFrame();
        }

        try {
            $frame->addRoll($pins);
        } catch (Exception $e) {
            //Add a completed frame to the array, and start a new one
            $this->frames[] = $frame;
            $frame = new BowlingFrame();
            $frame->addRoll($pins);
        }
        $this->frames[] = $frame;
    }

    public function getTotal()
    {
        $total = 0;
        foreach ($this->frames as $frame) {
            $total += $frame->getTotal();
        }
        return $total;
    }
}