<?php /*a:2:{s:52:"D:\www\larray\team\basetp6\view\admin\log\index.html";i:1595392315;s:58:"D:\www\larray\team\basetp6\view\admin\..\layouts\main.html";i:1595390800;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title><?php echo htmlentities((isset($title) && ($title !== '')?$title:'后台管理平台')); ?></title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/static/admin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/static/admin/css/common.css" media="all">
    <!--[if lt IE 9]>
    <script src="/static/admin/plugs/js/html5.min.js"></script>
    <script src="/static/admin/plugs/js/respond.min.js"></script>
    <![endif]-->
     
</head>

<body>
    <div class="layui-fluid">
        <div class="layui-card">
            <div class="layui-card-body">
                
<fieldset class="layui-elem-field layui-field-title">
    <legend><?php echo htmlentities($title); ?></legend>
</fieldset>
<blockquote class="layui-text">
    <div class="layui-form " lay-filter="dataTableId">
        <div class="layui-form-item">
            <div class="layui-input-inline">
                <input type="text" name="recog" id="recog" placeholder="请输入时间" autocomplete="off" class="layui-input">
            </div>
            <div class="layui-input-inline">
                <input type="text" name="username" id="username" placeholder="请输入管理员" autocomplete="off"
                    class="layui-input">
            </div>
            <div class="layui-inline">
                <button class="layui-btn" data-type="search">搜索</button>
                <button class="layui-btn" data-type="all">全部</button>
            </div>
        </div>
    </div>
</blockquote>
<script type="text/html" id="toolbarDemo">
    <div class="layui-btn-container">
        <?php if(in_array('admin/Log/destroy',$ca_path_arr)){?>
        <button class="layui-btn layui-btn-danger" data-url="<?php echo url('Log/destroy'); ?>" data-title="确定批量删除？"
            lay-event="batchdel"><i class="layui-icon layui-icon-delete"></i>批量删除</button>
        <?php }?>
    </div>
</script>
<table id="dataTable" lay-filter="dataTable"></table>
<script type="text/html" id="options">
    <?php if(in_array('admin/Log/destroy',$ca_path_arr)){?>
<a class="layui-btn layui-btn-danger layui-btn-xs" data-url="<?php echo url('Log/destroy'); ?>" data-title="确定删除？" lay-event="del"
    data-table-id="dataTableId"><i class="layui-icon layui-icon-delete"></i>删除</a>
<?php }?>
</script>

            </div>
        </div>
    </div>
    <script type="text/javascript" src="/static/admin/layui/layui.js"></script>
    <script>
        layui.config({
            base: "/static/admin/plugs/",
        }).extend({ //设定组件别名 //主入口模块(名字同样根据自己的结构改动)
            common: 'js/common',
            index: 'js/index',
            echarts: 'echarts/echarts',
            echartsTheme: 'echarts/echartsTheme',
            tinymceTextarea: 'tinymce/tinymceTextarea',
            layarea: 'select/layarea',
            iconPicker: 'iconPicker/iconPicker',
        }).use(['common', 'index', 'echarts', 'echartsTheme', 'tinymceTextarea', 'layarea', 'iconPicker']);
    </script>
    
<script>
    layui.use(['common'], function () {
        var common = layui.common;
        common.table('<?php echo htmlentities($title); ?>', "<?php echo url('Log/data'); ?>", [
            [{
                type: "checkbox",
                fixed: "left"
            }, {
                field: 'id',
                title: '序号',
                sort: true,
                width: 80,
                align: 'center',
            }, {
                field: "username",
                title: "管理员",
                align: 'center',
                width: 100,
            }, {
                field: "ip",
                title: "ip地址",
                align: 'center',
                width: 100,
            }, {
                field: "url",
                title: "请求链接",
                align: 'left',
                minWidth: 200,
            }, {
                field: "method",
                title: "请求类型",
                align: 'center',
                width: 100,
            }, {
                field: "remark",
                title: "操作行为",
                align: 'left',
                minWidth: 200,
            }, {
                field: "create_time",
                title: "创建时间",
                align: 'center',
                width: 160,
            }, {
                title: "操作",
                width: 150,
                align: "center",
                fixed: "right",
                toolbar: "#options"
            }]
        ], 240);
        range('recog');
    });
</script>

</body>

</html>