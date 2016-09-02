<!DOCTYPE html>
<html>
    <head>
        <title>验证</title>
        <script src="//cdn.bootcss.com/jquery/2.2.4/jquery.js"></script>
        <style>
            * {margin: 0; padding: 0;}
            body {font-size: 12px; font-family: 微软雅黑;}
            p {color: #666;}
            .selector {border: 1px solid #999; float: left; padding: 0 5px; margin-top: 10px;}
            .selector img {margin: 5px; margin-top: 7px; display: inline-block; width: 26px; height: 14px; cursor: pointer;}
            .cl:after {display: block; content: ' '; width: 100%; height: 0; clear: both;}
            .input {margin-top: 10px; border: 1px solid #999; float: left;}
            .input li {list-style: none; float: left; border-right: 1px solid #999; height: 30px; width: 40px;}
            .input li img {margin: 5px; margin-top: 9px; display: inline-block; width: 26px; height: 14px; padding: 0 2px;}
            .input li.backspace {border: none; cursor: pointer; padding: 0; width: 30px; height: 30px;}
            .input li.backspace img {width: 30px; height: 30px; margin: 0; padding: 0;}
            .keys {margin-top: 10px;}
            .keys .img {float: left; margin-left: 20px; border: 1px solid #999; height: 30px;}
            .keys .img img {margin: 5px; margin-top: 9px; display: inline-block; width: 26px; height: 14px; padding: 0 2px;}
            .keys a {display: block; height: 30px; line-height: 30px; margin-left: 10px; float: left; text-decoration: none; color: #f00;}
        </style>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <p>验证码：点击与验证码相应的文字到验证码输入框内</p>
        <div class="selector">
            <img src="/selector/1" />
            <img src="/selector/2" />
            <img src="/selector/3" />
            <img src="/selector/4" />
            <img src="/selector/5" />
            <img src="/selector/6" />
            <img src="/selector/7" />
            <img src="/selector/8" />
        </div>
        <div class="cl"></div>

        <ul class="input">
            <li></li>
            <li></li>
            <li></li>
            <li class="backspace"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeBAMAAADJHrORAAAAA3NCSVQICAjb4U/gAAAAIVBMVEWNkozy8vTr7evPz8/////By8fi4uG1t7b4+Pf19/X5+fkCZ0l7AAAACXBIWXMAAAsSAAALEgHS3X78AAAAFnRFWHRDcmVhdGlvbiBUaW1lADA4LzExLzE2WJZzpgAAABx0RVh0U29mdHdhcmUAQWRvYmUgRmlyZXdvcmtzIENTNui8sowAAACDSURBVBiVY1BCBQwDwVeT6JwJAouSIPxEFyiAyKuJoPKB0o5AjgiUD5J2rnJxDYHyQbo9y13CVaB8sG7n4ECYfohRBUtgfBWwfGgUjG8EZDiWu5QD9YHdowxU4FzosjzExQviPqACxyUg+6F8ZRVU94FNAAEPqH+Us1aC/TfNiO7hCwDa31abGiiIfwAAAABJRU5ErkJggg==" width="30" height="30" /></li>
        </ul>
        <div class="keys cl">
            <div class="img">
                <img src="/sk/1" data-id="1"/>
                <img src="/sk/2" data-id="2" />
                <img src="/sk/3" data-id="3" />
            </div>
            <a href="javascript:void(0);" id="change">换一张</a>
        </div>
        <button>提交</button>
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(function() {
                var selected = [];
                $('.selector img').click(function () {
                    var current, $this = $(this);
                    current = selected.length;
                    if(current >= 3) debugger;
                    $('.input li').eq(current).html('<img src="' + $this.attr('src') + '" />');
                    selected[current] = $this.index('.selector img') + 1;
                });
                $('.backspace').click(function () {
                    var current;
                    current = selected.length;
                    if(current == 0) return;
                    selected.pop();
                    $('.input li').eq(current - 1).empty();
                });
                $('button').click(function () {
                    $.post(
                        '/v',
                        {keys: selected},
                        function (result) {
                            if(result.result) {
                                alert('验证成功！');
                                // window.location.reload();
                            } else {
                                alert('验证失败！');
                            }
                        },
                        'json'
                    );
                });
                $('#change').click(function () {
                    $.get(
                        '/c',
                        function () {
                            $('.keys img').each(function () {
                                var $this = $(this);
                                $this.attr('src', '/sk/' + $this.data('id') + '?' + Date.parse(new Date()));
                            })
                        }
                    );
                });
            })
        </script>
    </body>
</html>
