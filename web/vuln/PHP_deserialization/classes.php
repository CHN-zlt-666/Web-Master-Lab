<?php

class A_destrcut
{
    /** @var mixed */
    public $a;
    public function __destruct()
    {
        echo "A中的destruct魔术方法被调用<br>";
        $this->a->hello();
    }
}
class A_toString
{
    /** @var mixed */
    public $a;
    public function __toString()
    {
        $this->a->hello();
        return "类A中的tostring函数被调用<br>";
    }
}
class A_wakeup
{
    /** @var mixed */
    public $a;
    public function __wakeup()
    {
        echo "A类中wakeup魔术方法被调用<br>";
        $this->a->hello();
    }
}
class B
{
    public function hello()
    {
        echo "B中的函数被调用<br>";
    }
}
class C
{
    /** @var mixed */
    public $c;
    public function hello()
    {
        $this->c->danger();
    }
}
class D
{
    /** @var mixed */
    public $d;
    public function hello()
    {
        $this->d->danger();
    }
}
class faker
{
    /** @var mixed */
    public $cmd;
    public function danger()
    {
        system($this->cmd);
    }
}
class test
{
    public function hello()
    {
        echo "test->hello调用函数";
    }
}
