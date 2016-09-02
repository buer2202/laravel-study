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


class TestController extends Controller
{
    public function __construct()
    {

    }

    public function index($id = 1)
    {
        $post = Comment::findOrFail($id);

        // dump(Gate::check('update-post', $post));

        if (Gate::denies('update', $post)) {
            echo 403;
        }

    }
}
