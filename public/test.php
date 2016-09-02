<?php
set_exception_handler('exception_handler');

class MyException1 extends Exception
{
    public function __construct($message = 'My Own Exception1')
    {
        parent::__construct($message);
    }
}

class MyException2 extends Exception
{
    public function __construct($message = 'My Own Exception2')
    {
        parent::__construct($message);
    }
}

function foo()
{
    try {
        throw new MyException1;
    } catch (MyException2 $e) {
        echo $e->getMessage();
    } catch (MyException1 $e) {
        echo $e->getMessage();
    }
}

function bar()
{
    try {
        foo();
    } catch (MyException1 $e) {
        echo $e->getMessage();
    }
}


foo();

function exception_handler($exception) {
  echo "Uncaught exception!!!!!!!!!!: " , $exception->getMessage(), "\n";
}

echo 12343214123412344231423112434123;
