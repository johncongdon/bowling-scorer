<?php

class BowlingFrame
{
    protected $rolls = [];

    public function getTotal()
    {
        return array_sum($this->rolls);
    }

    public function addRoll($pins)
    {
        if (count($this->rolls) == 2) {
            throw new Exception("We've already scored two rolls in this frame");
        }
        $this->rolls[] += $pins == 9 ? 0 : $pins;
    }
}