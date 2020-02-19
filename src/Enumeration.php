<?php


namespace L41rx\FE3H;


abstract class Enumeration extends \SplEnum
{
    public function all() {
        return $this->getConstList();
    }
}
