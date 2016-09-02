<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class VController extends Controller
{
    public function index ()
    {
        $this->getWords(8);
        $this->generateKeys(8);
        return view('validate');
    }

    public function getWords ($count)
    {
        $words = ['玉米', '花生', '小米', '黄豆', '白面', '丝瓜', '荞麦', '黑豆', '西瓜', '葡萄', '芒果', '榴莲',];
        $wordsCount = count($words);
        shuffle($words);
        session(['words' => array_slice($words, 0, min($count, $wordsCount))]);
        return true;
    }

    public function generateKeys ($max, $count = 3)
    {
        $keys = [];
        while(count($keys) != 3) {
            $num = mt_rand(1, $max);
            if (!in_array($num, $keys)) {
                $keys[] = $num;
            }
        }
        session(['keys' => $keys]);
        return true;
    }

    public function selector ($id)
    {
        $words = session('words');
        $text = $id > count($words) ? '错误' : $words[$id - 1];
        $this->showPic($text);
    }

    public function sk ($id)
    {
        $words = session('words');
        $keys = session('keys');
        $this->showPic($words[$keys[$id - 1] - 1], 255, 106, 32);
    }

    public function showPic ($text, $r = 0, $g = 0, $b = 0)
    {
        $height = 14;
        $width = 26;
        $im = imagecreatetrueColor($width, $height);
        $color = imagecolorallocate($im, $r, $g, $b);
        imagefill($im, 0, 0, imagecolorallocate($im, 255, 255, 255));
        $font = '../resources/msyh.ttc';
        imagettftext($im, 10, 0, 1, 12, $color, $font, $text);
        header("Content-type: image/png");
        imagepng($im);
        imagedestroy($im);
    }

    public function v (Request $r)
    {
        $inputKeys = $r->input('keys');
        $keys = session('keys');
        foreach($keys as $k => $v) {
            if($v != $inputKeys[$k]) {
                return response()->json(['result' => false]);
            }
        }
        return response()->json(['result' => true]);
    }

    public function change () {
        $this->generateKeys(8);
    }
}
