<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <div class="row">
    <div class="col-sm-4">
    <h2>页面导航</h2>
        <hr>
    <div class="card">
        <div class="card-body">序言</div>
    </div>
    <br>
    <div class="card bg-primary text-white">
        <div class="card-body">快速入门 -&nbsp;
            @if (($records) === 1)
                I have one record!
            @elseif ($records > 1)
                I have multiple records!
            @else
                I don't have any records!
            @endif
        </div>
    </div>
    <br>
    <div class="card bg-success text-white">
        <div class="card-body">核心概念</div>
    </div>
    <br>
    <div class="card bg-info text-white">
        <div class="card-body">基础组件</div>
    </div>
    <br>
    <div class="card bg-warning text-white">
        <div class="card-body">前端开发</div>
    </div>

        <br>


    <div class="card bg-danger text-white">
        <div class="card-body">安全系列</div>
    </div>
    <br>
    <div class="card bg-secondary text-white">
        <div class="card-body">进阶系列</div>
    </div>
    <br>
    <div class="card bg-dark text-white">
        <div class="card-body">数据库操作</div>
    </div>
    <br>
    <div class="card bg-light text-dark">
        <div class="card-body">Eloquent ORM</div>
    </div>
    </div>

</div>

</body>
</html>
