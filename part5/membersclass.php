<?php
  class Members implements IteratorAggregate{
    private $members = [];
    public function add(Member $member){
      $this->members[] = $member;
    }
    public function getiterator(){
      return new ArrayIterator($this->members);
    }
  }?>
