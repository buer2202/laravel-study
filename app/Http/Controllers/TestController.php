<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App;

use DB;

use Debugbar;

use Hash;

use App\User;
use App\Comment;
use App\Post;

use Route;

use Carbon\Carbon;

use Cache;

use Crypt;

use Log;

use Event;
use App\Events\SomeEvent;

use Storage;

use Auth;

use Gate;

use Mail;

class TestController extends Controller
{
    public function __construct()
    {

    }

    public function index($id = 1)
    {
        $user = User::findOrFail($id);
        // dd($user);

        Mail::send('welcome', ['user' => $user], function ($m) use ($user) {
            $m->from('buer2202@163.com', 'Buer');
            $m->to($user->email, $user->name)->subject('Your Reminder!');
        });

        return view('welcome');
    }
}
