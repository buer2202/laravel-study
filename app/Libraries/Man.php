<?php
namespace App\Libraries;

class Man/* implements maninterface*/
{
    public $eat;

    public function listen()
    {
        return 'man-listen';
    }

    public function eat($eat) {
        $this->eat = $eat;
    }
}