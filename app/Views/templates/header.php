<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>出勤管理系統</title>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <style type="text/css">
        @import url('css/style.css');

        @font-face {
            font-family: custom-sans-serif;
            src: local("Heiti TC"), local("微軟正黑體"), local("Microsoft JhengHei");
            unicode-range: U+4E00-9FFF;
        }

        @font-face {
            font-family: custom-sans-serif;
            src: local(Helvetica), local(Segoe UI), local("Calibri");
            unicode-range: U+00-024F;
        }

        * {
            font-family: "custom-sans-serif", serif;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <a href="<?php echo base_url() ?>" class="navbar-brand">出勤管理系統</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="<?php echo base_url('Emp') ?>" class="nav-link">員工資料維護</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('Org') ?>" class="nav-link">部門維護</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('SchedulRule') ?>" class="nav-link">員工班別維護</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('DutyRule') ?>" class="nav-link">班別規則維護</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('Rule') ?>" class="nav-link">設定檔維護</a>
                </li>
            </ul>
        </div>
    </nav>
    </br>