<?php /*a:2:{s:58:"D:\www\larray\team\basetp6\view\admin\permission\form.html";i:1595391714;s:58:"D:\www\larray\team\basetp6\view\admin\..\layouts\main.html";i:1595390800;}*/ ?>
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
                
<form class="layui-form">
    <div class="layui-form-item">
        <label class="layui-form-label">显示序号：</label>
        <div class="layui-input-inline">
            <input type="number" name="sort" autocomplete="off" lay-verify="required|number" placeholder="请输入显示序号"
                min="0" value="<?php echo htmlentities($showor); ?>" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">隶属类型：</label>
        <div class="layui-input-block">
            <select name="pid" lay-search>
                <option value="0">---一级权限---</option>
                <?php foreach($up_per as $k=>$vo): ?>
                <option <?php if($info['pid'] == $vo['id']): ?>selected<?php endif; ?> value="<?php echo htmlentities($vo['id']); ?>"><?php echo htmlentities($vo['title']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">权限名称：</label>
        <div class="layui-input-block">
            <input type="text" name="title" autocomplete="off" lay-verify="required" placeholder="请输入权限名称"
                value="<?php echo htmlentities($info['title']); ?>" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">路径名称：</label>
        <div class="layui-input-block">
            <input type="text" name="name" autocomplete="off" placeholder="请输入全路径名称" value="<?php echo htmlentities($info['name']); ?>"
                class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">默认图标：</label>
        <div class="layui-input-inline">
            <input type="text" name="icon" autocomplete="off" id="icon" placeholder="请输入图标代码" value="<?php echo htmlentities($info['icon']); ?>"
                class="layui-input">
        </div>
        <div class="layui-input-inline">
            <input type="text" id="iconPicker" lay-filter="iconPicker" class="hide">
        </div>
    </div>
    <div class="layui-form-item layui-form-text">
        <label class="layui-form-label">状态：</label>
        <div class="layui-input-block">
            <input type="checkbox" name="status" lay-skin="switch" lay-text="开启|禁用" value="1" <?php if($info['status']== 1): ?>checked<?php endif; ?>> </div> </div> <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">备注：</label>
            <div class="layui-input-block">
                <textarea placeholder="请输入备注" name="remarks" class="layui-textarea"><?php echo htmlentities($info['remarks']); ?></textarea>
            </div>
        </div>
        <input type="hidden" name="id" value="<?php echo htmlentities($info['id']); ?>">
        <div class="layui-form-item layui-layer-btn-c">
            <label class="layui-form-label"></label>
            <div class="layui-input-block">
                <button class="layui-btn layui-layer-btn0" lay-submit="" lay-filter="demo">提交</button>
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
    layui.use(['form', 'iconPicker', 'common'], function () {
        var $ = layui.$,
            form = layui.form,
            common = layui.common,
            iconPicker = layui.iconPicker;

        iconPicker.render({
            // 选择器，推荐使用input
            elem: '#iconPicker',
            // 数据类型：fontClass/unicode，推荐使用fontClass
            type: 'fontClass',
            // 是否开启搜索：true/false
            search: true,
            // 是否开启分页
            page: true,
            // 每页显示数量，默认12
            limit: 12,
            // 点击回调
            click: function (data) {
                $('#icon').val(data.icon);
            }
        });
        //选中图标
        iconPicker.checkIcon('iconPicker', $('#icon').val());
        common.submit('demo', "<?php echo url('permission/form'); ?>");

    })
</script>

</body>

</html>