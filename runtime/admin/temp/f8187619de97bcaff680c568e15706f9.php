<?php /*a:2:{s:53:"D:\www\larray\team\basetp6\view\admin\role\index.html";i:1595392304;s:58:"D:\www\larray\team\basetp6\view\admin\..\layouts\main.html";i:1595390800;}*/ ?>
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
    <div class="layui-form" lay-filter="dataTableId">
        <div class="layui-form-item">
            <div class="layui-inline">
                <div class="layui-input-inline">
                    <input type="text" name="title" id="title" placeholder="请输入角色" autocomplete="off"
                        class="layui-input">
                </div>
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
        <?php if(in_array('admin/Role/form',$ca_path_arr)){?>
        <button class="layui-btn" data-url="<?php echo url('Role/form'); ?>" data-title="添加角色" data-width="30%" data-height="250px"
            lay-event="add"><i class="layui-icon layui-icon-add-1"></i>添加</button>
        <?php }if(in_array('admin/Role/destroy',$ca_path_arr)){?>
        <button class="layui-btn layui-btn-danger" data-title="确定批量删除？" data-url='<?php echo url("Role/destroy"); ?>?id={{d.id}}'
            lay-event="batchdel"><i class="layui-icon layui-icon-delete"></i>批量删除</button>
        <?php }?>
    </div>
</script>
<table id="dataTable" lay-filter="dataTable"></table>
<script type="text/html" id="options">
    <?php if(in_array('admin/Role/form',$ca_path_arr)){?>
<a class="layui-btn layui-btn-normal layui-btn-xs" data-url="<?php echo url('Role/form'); ?>?id={{d.id}}" data-title="编辑角色"
    data-width="40%" data-height="40%" lay-event="edit" data-table-id="dataTableId"><i
        class="layui-icon layui-icon-edit"></i>编辑</a>
<?php }if(in_array('admin/Role/destroy',$ca_path_arr)){?> {{# if(d.id != 1){ }}
<a class="layui-btn layui-btn-danger layui-btn-xs" data-title="确定删除？" data-url='<?php echo url("Role/destroy"); ?>?id={{d.id}}'
    lay-event="del" data-table-id="dataTableId"><i class="layui-icon layui-icon-delete"></i>删除</a> {{# } }}
<?php }if(in_array('admin/Role/power',$ca_path_arr)){?>
<a class="layui-btn layui-btn-normal layui-bg-orange layui-btn-xs" data-url="<?php echo url('Role/power'); ?>?id={{d.id}}"
    data-title="编辑赋权信息" data-width="80%" data-height="70%" lay-event="edit" data-table-id="dataTableId"><i
        class="layui-icon layui-icon-util"></i>赋权</a>
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
        common.table('<?php echo htmlentities($title); ?>', "<?php echo url('role/data'); ?>", [
            [{
                type: "checkbox",
                fixed: "left"
            }, {
                field: 'id',
                title: '序号',
                sort: true,
                align: 'center',
                width: 80,
            }, {
                field: "title",
                title: "角色名称",
                align: 'center',
                minWidth: 120,
            }, {
                field: "status",
                title: "状态",
                unresize: true,
                align: 'center',
                width: 120,
                templet: function (d) {
                    if (d.status == 1) {
                        return '<input type="checkbox" name="status" value="' + d.id +
                            '" lay-skin="switch" lay-text="启用|禁用" lay-filter="status" checked >';
                    } else {
                        return '<input type="checkbox" name="status" value="' + d.id +
                            '" lay-skin="switch" lay-text="启用|禁用" lay-filter="status" >';
                    }
                },
            }, {
                field: "create_time",
                title: "创建时间",
                align: 'center',
                width: 160,
            }, {
                title: "操作",
                width: 250,
                align: "center",
                fixed: "right",
                toolbar: "#options"
            }]
        ], 240);
        common.switch("status", "<?php echo url('state'); ?>");
    });
</script>

</body>

</html>