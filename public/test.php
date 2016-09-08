<?php
class User
{
    public function __construct(Vip $a)
    {
        $this->a = $a;
    }

    public function index($abc)
    {
        echo 'user.index';
    }
}

class Vip
{

}

$user = new User(new Vip);

// var_dump($user instanceof User);

$aa = new ReflectionClass('User');

var_dump($aa->getConstructor()->getParameters());

// var_dump(get_class_methods('User'));