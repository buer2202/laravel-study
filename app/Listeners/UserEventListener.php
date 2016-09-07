<?php

namespace App\Listeners;

class UserEventListener{
    /**
     * 处理用户登录事件
     */
    public function onUserLogin($event) {
        dump('onUserLogin');
    }

    /**
     * 处理用户退出事件
     */
    public function onUserLogout($event) {}

    /**
     * 为订阅者注册监听器
     *
     * @param  Illuminate\Events\Dispatcher  $events
     * @return array
     */
    public function subscribe($events)
    {
        $events->listen(
            'App\Events\SomeEvent',
            'App\Listeners\AnotherEventListener@onUserLogin'
        );

        $events->listen(
            'App\Events\UserLoggedOut',
            'App\Listeners\UserEventListener@onUserLogout'
        );
    }

}
