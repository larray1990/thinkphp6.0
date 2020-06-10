<?php /*a:2:{s:54:"D:\www\larray\team\basetp6\view\admin\admin\index.html";i:1589251715;s:59:"D:\www\larray\team\basetp6\view\admin\..\layouts\admin.html";i:1591325975;}*/ ?>
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
            <div class="layui-inline">
                <div class="layui-input-inline">
                    <select name="username" id="username" lay-search>
                        <option value="">--请选择账号--</option>
                        <?php foreach($admin as $key=>$val): ?>
                        <option value="<?php echo htmlentities($val['username']); ?>"><?php echo htmlentities($val['username']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="layui-inline">
                <div class="layui-input-inline">
                    <select name="sex" id="sex" lay-search>
                        <option value="">--请选择性别--</option>
                        <option value="1">男</option>
                        <option value="2">女</option>
                    </select>
                </div>
            </div>
            <div class="layui-inline">
                <div class="layui-input-inline">
                    <input type="text" name="phone" id="phone" placeholder="请输入手机号" autocomplete="off"
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
<blockquote class="layui-text">
    <div class="layui-inline" style="font-size: 14px;margin-right: 10px;">
        <span class="layui-badge-dot layui-bg-green"></span> 销售总金额：<span
            style="font-size: 20px; font-weight: bold;color: #FF5722" id="allmoney"></span> 元
    </div>|
    <div class="layui-inline" style="font-size: 14px;">
        <span class="layui-badge-dot layui-bg-green" style="margin-left: 10px; "></span> 总销量：<span
            style="font-size: 20px; font-weight: bold;color: #01AAED" id="all_mum"></span>
    </div>
</blockquote>
<script type="text/html" id="toolbarDemo">
    <div class="layui-btn-container">
        <?php if(in_array('admin/Admin/form',$ca_path_arr)){?>
        <button class="layui-btn" data-url="<?php echo url('Admin/form'); ?>" data-title="添加管理员" data-width="80%" data-height="70%"
            lay-event="add"><i class="layui-icon layui-icon-add-1"></i>添加</button>
        <?php }if(in_array('admin/Admin/destroy',$ca_path_arr)){?>
        <button class="layui-btn layui-btn-danger" data-url="<?php echo url('Admin/destroy'); ?>" data-title="确定批量删除？"
            lay-event="batchdel"><i class="layui-icon layui-icon-delete"></i>批量删除
        </button>
        <?php }if(in_array('admin/Admin/import',$ca_path_arr)){?>
        <button class="layui-btn " data-url="<?php echo url('admin/import'); ?>" data-title="导入Excel" data-width="40%"
            data-height="40%" lay-event="add"><i class="layui-icon layui-icon-export"></i>导入Excel</button>
        <?php }?>
    </div>
</script>
<table id="dataTable" lay-filter="dataTable"></table>
<script type="text/html" id="options">
    <?php if(in_array('admin/Admin/show',$ca_path_arr)){?>
<a class="layui-btn layui-bg-cyan layui-btn-xs" data-url="<?php echo url('Admin/show'); ?>?id={{d.id}}" data-title="查看管理员"
    data-width="80%" data-height="70%" lay-event="edit" data-table-id="dataTableId"><i
        class="layui-icon layui-icon-engine"></i>查看</a>
<?php }if(in_array('admin/Admin/form',$ca_path_arr)){?>
<a class="layui-btn layui-btn-normal layui-btn-xs" data-url="<?php echo url('Admin/form'); ?>?id={{d.id}}" data-title="编辑管理员"
    data-width="80%" data-height="70%" lay-event="edit" data-table-id="dataTableId"><i
        class="layui-icon layui-icon-edit"></i>编辑</a>
<?php }if(in_array('admin/Admin/destroy',$ca_path_arr)){?> {{# if(d.name != 'admin'){ }}
<a class="layui-btn layui-btn-danger layui-btn-xs" data-title="确定删除？" data-url='<?php echo url("Admin/destroy"); ?>' lay-event="del"
    data-table-id="dataTableId"><i class="layui-icon layui-icon-delete"></i>删除</a> {{# } }}
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
        }).use(['common', 'index', 'echarts', 'echartsTheme', 'tinymceTextarea', 'layarea','iconPicker']);
    </script>
    
<script>
    layui.use(['common', 'jquery'], function () {
        var $ = layui.$,
            common = layui.common;
        common.table('<?php echo htmlentities($title); ?>', "<?php echo url('admin/data'); ?>", [
            [{
                checkbox: true,
                fixed: 'left'
            }, {
                field: 'id',
                title: '序号',
                sort: true,
                align: 'center',
                width: 80
            }, {
                field: 'username',
                title: '账号',
                align: 'center',
                width: 120,
            }, {
                field: 'fullname',
                title: '姓名',
                align: 'center',
                width: 120,
            }, {
                field: 'sex',
                title: '性别',
                align: 'center',
                width: 60,
                templet: function (d) {
                    if (d.sex == 1) {
                        return '男';
                    } else {
                        return '女';
                    }
                }
            }, {
                field: 'phone',
                title: '手机',
                align: 'center',
                width: 120,
                edit: "text"
            }, {
                field: 'title',
                title: '角色类型',
                align: 'center',
                width: 160,
            }, {
                field: 'area',
                title: '地址',
                align: 'center',
                minWidth: 180,
            }, {
                field: "status",
                align: 'center',
                unresize: true,
                title: "状态",
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
                field: "is_admin",
                align: 'center',
                unresize: true,
                title: "是否管理员",
                width: 120,
                templet: function (d) {
                    if (d.is_admin == 1) {
                        return '<input type="checkbox" name="is_admin" value="' + d.id +
                            '" lay-skin="switch" lay-text="是|否" lay-filter="is_admin" checked>';
                    } else {
                        return '<input type="checkbox" name="is_admin" value="' + d.id +
                            '" lay-skin="switch" lay-text="是|否" lay-filter="is_admin" >';
                    }
                },
            }, {
                field: 'create_time',
                title: '创建时间',
                align: 'center',
                width: 160,
            }, {
                title: "操作",
                width: 220,
                align: "center",
                fixed: 'right',
                toolbar: "#options"
            }]
        ], 250, function (res) {
            $('#allmoney').html(res.all.all_money);
            $('#all_mum').html(res.all.all_num);
        });
        common.switch("status", "<?php echo url('state'); ?>");
        common.switch("is_admin", "<?php echo url('checkAdmin'); ?>");
        common.editField('dataTable', "<?php echo url('edit'); ?>");
    });
</script>

</body>
</html>