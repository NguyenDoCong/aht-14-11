<?php
class ReadingList
{
    protected $stack;
    protected $limit;

    public function __construct($limit = 10)
    {
        // initialize the stack
        $this->stack = array();
        // stack can only contain this many items
        $this->limit = $limit;
    }

    public function push($item)
    {
        // trap for stack overflow
        if (count($this->stack) < $this->limit) {
            // prepend item to the start of the array
            array_unshift($this->stack, $item);
        } else {
            throw new RunTimeException('Stack is full!');
        }
    }

    public function pop()
    {
        if ($this->isEmpty()) {
            // trap for stack underflow
            throw new RunTimeException('Stack is empty!');
        } else {
            // pop item from the start of the array
            return array_shift($this->stack);
        }
    }

    public function top()
    {
        return current($this->stack);
    }

    public function isEmpty()
    {
        return empty($this->stack);
    }
}

$myBooks = new ReadingList();
$myBooks->push('A Dream of Spring');
$myBooks->push('The Winds of Winter');
$myBooks->push('A Dance with Dragons');
$myBooks->push('A Feast for Crows');
$myBooks->push('A Storm of Swords');

echo $myBooks->pop();
echo "\n";
echo $myBooks->pop();
echo "\n";
echo $myBooks->pop();
echo "\n";

$myBooks->push('A Clash of Kings');
$myBooks->push('A Game of Thrones');

echo $myBooks->isEmpty() ? "The stack is empty" : "The stack is not empty";
echo "\n";

echo $myBooks->pop();
echo "\n";
echo $myBooks->pop();
echo "\n";
echo $myBooks->pop();
echo "\n";
echo $myBooks->pop();
echo "\n";

echo $myBooks->isEmpty() ? "The stack is empty" : "The stack is not empty";
echo "\n";
