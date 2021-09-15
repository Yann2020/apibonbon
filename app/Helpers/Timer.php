<?php

namespace App\Helpers;
    class Timer
    {
        public $start;
        public $end;

        

        public function timer()
        {
            $this->start = microtime(true);
        }

        public function finish()
        {
            $this->end = microtime(true);
        }

        public function getStart()
        {
            if(isset($this->start)):
                return $this->start;
            else:
                return false;
            endif;
        }

        public function getEnd()
        {
            if(isset($this->end))
                return $this->end;
            else
                return false;
        }

        public function getDiff()
        {
            return $this->getEnd() - $this->getStart();
        }

        public function reset()
        {
            $this->start = microtime(true);
        }
    }
