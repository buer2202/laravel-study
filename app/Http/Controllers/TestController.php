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

use Illuminate\Pagination\LengthAwarePaginator;

class TestController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        var_dump(PHP_EOL.Inspiring::quote().PHP_EOL);
    }
}
