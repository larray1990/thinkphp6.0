<?php /*a:2:{s:56:"D:\www\larray\team\basetp6\view\admin\index\welcome.html";i:1575770371;s:54:"D:\www\larray\team\basetp6\view\admin\public\main.html";i:1574667809;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>>标题</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/static/admin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/static/admin/css/common.css" media="all">
    <!--[if lt IE 9]>
    <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<style>
    .layuiadmin-card-list{
        padding: 15px;
    }
    .layui-card-body{
        position: relative;
        padding: 10px 15px;
        line-height: 24px;
    }
    .layui-card-carousel{
        height: 350px;
    }
    .layuiadmin-card-list p.layuiadmin-normal-font {
        padding-bottom: 10px;
        font-size: 20px;
        color: #666;
        line-height: 24px;
    }
    .layuiadmin-badge, .layuiadmin-btn-group, .layuiadmin-span-color {
        position: absolute;
        right: 15px;
    }
    .layuiadmin-card-list p.layuiadmin-big-font {
        font-size: 36px;
        color: #666;
        line-height: 36px;
        padding: 5px 0 10px;
        overflow: hidden;
        text-overflow: ellipsis;
        word-break: break-all;
        white-space: nowrap;
    }
    .layui-card {
        margin-bottom: 15px;
        border-radius: 2px;
        background-color: #fff;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, .05);
    }
</style>
<div class="layui-fluid">
    <div class="layui-row layui-col-space15">
        <div class="layui-col-sm6 layui-col-md3">
            <div class="layui-card">
                <div class="layui-card-header">
                    访问量
                    <span class="layui-badge layui-bg-blue layuiadmin-badge">周</span>
                </div>
                <div class="layui-card-body layuiadmin-card-list">
                    <p class="layuiadmin-big-font">9,999,666</p>
                    <p>
                        总计访问量
                        <span class="layuiadmin-span-color">88万 <i class="layui-inline layui-icon layui-icon-flag"></i></span>
                    </p>
                </div>
            </div>
        </div>
        <div class="layui-col-sm6 layui-col-md3">
            <div class="layui-card">
                <div class="layui-card-header">
                    下载
                    <span class="layui-badge layui-bg-cyan layuiadmin-badge">月</span>
                </div>
                <div class="layui-card-body layuiadmin-card-list">
                    <p class="layuiadmin-big-font">33,555</p>
                    <p>
                        新下载
                        <span class="layuiadmin-span-color">10% <i
                                class="layui-inline layui-icon layui-icon-face-smile-b"></i></span>
                    </p>
                </div>
            </div>
        </div>
        <div class="layui-col-sm6 layui-col-md3">
            <div class="layui-card">
                <div class="layui-card-header">
                    收入
                    <span class="layui-badge layui-bg-green layuiadmin-badge">年</span>
                </div>
                <div class="layui-card-body layuiadmin-card-list">

                    <p class="layuiadmin-big-font">999,666</p>
                    <p>
                        总收入
                        <span class="layuiadmin-span-color">*** <i
                                class="layui-inline layui-icon layui-icon-dollar"></i></span>
                    </p>
                </div>
            </div>
        </div>
        <div class="layui-col-sm6 layui-col-md3">
            <div class="layui-card">
                <div class="layui-card-header">
                    活跃用户
                    <span class="layui-badge layui-bg-orange layuiadmin-badge">月</span>
                </div>
                <div class="layui-card-body layuiadmin-card-list">

                    <p class="layuiadmin-big-font">66,666</p>
                    <p>
                        最近一个月
                        <span class="layuiadmin-span-color">15% <i class="layui-inline layui-icon layui-icon-user"></i></span>
                    </p>
                </div>
            </div>
        </div>
        <div class="layui-col-sm12">
            <div class="layui-card">
                <div class="layui-card-header">
                    访问量
                    <div class="layui-btn-group layuiadmin-btn-group">
                        <a href="javascript:;" class="layui-btn layui-btn-primary layui-btn-xs">去年</a>
                        <a href="javascript:;" class="layui-btn layui-btn-primary layui-btn-xs">今年</a>
                    </div>
                </div>
                <div class="layui-card-body">
                    <div class="layui-row">
                        <div class="layui-col-sm8">
                            <div id="test" class="layui-carousel layui-card-carousel" data-anim="fade" lay-filter="pagetwo">
                                <div id="pagetwo" style="width: 90%;height: 100%">
                                    <div><i class="layui-icon layui-icon-loading1"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="layui-col-sm4">
                            <div class="layuiadmin-card-list">
                                <p class="layuiadmin-normal-font">月访问数</p>
                                <span>同上期增长</span>
                                <div class="layui-progress layui-progress-big" lay-showPercent="yes">
                                    <div class="layui-progress-bar" lay-percent="30%"></div>
                                </div>
                            </div>
                            <div class="layuiadmin-card-list">
                                <p class="layuiadmin-normal-font">月下载数</p>
                                <span>同上期增长</span>
                                <div class="layui-progress layui-progress-big" lay-showPercent="yes">
                                    <div class="layui-progress-bar" lay-percent="20%"></div>
                                </div>
                            </div>
                            <div class="layuiadmin-card-list">
                                <p class="layuiadmin-normal-font">月收入</p>
                                <span>同上期增长</span>
                                <div class="layui-progress layui-progress-big" lay-showPercent="yes">
                                    <div class="layui-progress-bar" lay-percent="25%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="/static/admin/layui/layui.js"></script>

<script>
    layui.config({
        base: '/static/admin/extend/' //静态资源所在路径
    }).extend({
        echarts: 'echarts/echarts', //主入口模块(名字同样根据自己的结构改动)
        echartsTheme: 'echarts/echartsTheme', //主入口模块(名字同样根据自己的结构改动)
    }).use(['echarts','jquery','echartsTheme'], function() {
        var $ = layui.$,
            echarts = layui.echarts;      //标准柱状图
            echartsTheme = layui.echartsTheme;      //标准柱状图
            $.ajax({
                url: "<?php echo url('index/data1'); ?>",
                type: 'get',
                contentType: 'application/json',
                success: function (res) {
                    var echnormcol = [],
                    normcol = [res['data']];
                    elemNormcol = $('#pagetwo');
                    renderNormcol = function (index) {
                        echnormcol[index] = echarts.init(elemNormcol[index],echartsTheme);
                        echnormcol[index].setOption(normcol[index]);
                        window.onresize = echnormcol[index].resize;
                    };
                    if (!elemNormcol[0]) return;
                    renderNormcol(0);
                }
            });

    });
</script>

</body>
</html>