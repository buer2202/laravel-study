<?php
namespace App\Libraries;

use App\User;

class Man/* implements maninterface*/
{
    public $eat;

    public function __construct(User $user)
    {
        // dump($user);
        echo $user->name;
    }

    public function listen()
    {
        return 'man-listen';
    }

    public function eat($eat) {
        $this->eat = $eat;
    }
}