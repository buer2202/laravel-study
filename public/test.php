<?php
class User
{
    public function index()
    {
        echo 'user.index';
    }
}

class Vip
{

}

$user = new Vip;

// var_dump($user instanceof User);

var_dump(is_subclass_of($user, 'Vip'));
