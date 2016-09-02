<html>
<head>
    <title>test</title>
    <meta charset="UTF-8">
    <script src="//cdn.bootcss.com/jquery/3.1.0/jquery.min.js"></script>
    <script>
    $(function () {
        function longlink() {
            $("#show").text("正在连接");

            $.get("{{ route('login') }}", function (data) {
                if(data.status === 1) {
                    $("#show").text("有反应了");
                } else {
                    $("#show").text("没反应，继续");
                    longlink();
                }
            }, "json");
        }

        $("#begin").click(function () {
            longlink();
        });
    });
    </script>
</head>
<body>
    <div class="container">
        <h1>长连接</h1>
        <button id="begin" class="btn btn-success">开始</button>
        <div id="show">我是一个长连接</div>
    </div>
</body>
</html>
