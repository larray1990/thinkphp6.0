<?php /*a:2:{s:52:"D:\www\larray\team\basetp6\view\admin\role\form.html";i:1595391968;s:58:"D:\www\larray\team\basetp6\view\admin\..\layouts\main.html";i:1595390800;}*/ ?>
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
                
    <form class="layui-form" >
        <div class="layui-form-item">
            <label class="layui-form-label">角色名称:</label>
            <div class="layui-input-inline">
                <input type="text" name="title" lay-verify="required" placeholder="请输入角色名称" autocomplete="off"
                    class="layui-input" value="<?php echo htmlentities($info['title']); ?>">
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">状态：</label>
            <div class="layui-input-block">
                <input type="checkbox" name="status" lay-skin="switch" lay-text="开启|禁用" value="1" <?php if($info['status']== 1): ?>checked<?php endif; ?>> </div> </div> <input type="hidden" name="id"
                    value="<?php echo htmlentities($info['id']); ?>">
                <div class="layui-form-item layui-layer-btn-c">
                    <label class="layui-form-label"></label>
                    <div class="layui-input-block">
                        <button class="layui-btn layui-layer-btn0" lay-submit="" lay-filter="demo">提交</button>
                    </div>
                </div>
            </div>
        </div>
    </form> 

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
    layui.use(['form', 'common'], function () {
        var $ = layui.$,
            common = layui.common,
            form = layui.form;
        common.submit('demo', "<?php echo url('role/form'); ?>");
    });
</script>

</body>

</html>