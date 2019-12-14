<?php /*a:1:{s:57:"D:\www\larray\team\basetp6\app\home\view\index\index.html";i:1575774506;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>首页</title>
    <link rel="stylesheet" href="/static/admin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/static/admin/css/common.css" media="all">
    <!--[if lt IE 9]>
    <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body style="margin: auto 200px;">
    <div class="layui-layout">
        <div class="layui-header" >
            <ul class="layui-nav layui-bg-cyan" lay-filter="">
                <li class="layui-nav-item layui-this layui-col-md-offset4"><a href="">首页</a></li>
                <li class="layui-nav-item"><a href="">产品</a></li>
                <li class="layui-nav-item"><a href="">大数据</a></li>
                <li class="layui-nav-item">
                    <a href="javascript:;">解决方案</a>
                    <dl class="layui-nav-child"> <!-- 二级菜单 -->
                        <dd><a href="">移动模块</a></dd>
                        <dd><a href="">后台模版</a></dd>
                        <dd><a href="">电商平台</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item"><a href="">社区</a></li>
            </ul>
        </div>
        <div class="layui-body-content">
            <!-- 内容主体区域 -->
            <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
                <legend>简约时间线：大事记</legend>
            </fieldset>
            <ul class="layui-timeline">
                <li class="layui-timeline-item">
                    <i class="layui-icon layui-timeline-axis"></i>
                    <div class="layui-timeline-content layui-text">
                        <div class="layui-timeline-title">2018年，layui 5.0 发布。并发展成为中国最受欢迎的前端UI框架（期望）</div>
                    </div>
                </li>
                <li class="layui-timeline-item">
                    <i class="layui-icon layui-timeline-axis"></i>
                    <div class="layui-timeline-content layui-text">
                        <div class="layui-timeline-title">2017年，layui 里程碑版本 2.0 发布</div>
                    </div>
                </li>
                <li class="layui-timeline-item">
                    <i class="layui-icon layui-timeline-axis"></i>
                    <div class="layui-timeline-content layui-text">
                        <div class="layui-timeline-title">2016年，layui 首个版本发布</div>
                    </div>
                </li>
                <li class="layui-timeline-item">
                    <i class="layui-icon layui-timeline-axis"></i>
                    <div class="layui-timeline-content layui-text">
                        <div class="layui-timeline-title">2015年，layui 孵化</div>
                    </div>
                </li>
                <li class="layui-timeline-item">
                    <i class="layui-icon layui-anim layui-anim-rotate layui-anim-loop layui-timeline-axis"></i>
                    <div class="layui-timeline-content layui-text">
                        <div class="layui-timeline-title">更久前，轮子时代。维护几个独立组件：layer等</div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="layui-foot">
            <!-- 底部固定区域 -->
            © layui.com - 底部固定区域
        </div>
    </div>
</body>
<script type="text/javascript" src="/static/admin/js/jquery.min.js"></script>
<script type="text/javascript" src="/static/admin/layui/layui.js"></script>
<script type="text/javascript" src="/static/admin/js/common.js"></script>
</html>