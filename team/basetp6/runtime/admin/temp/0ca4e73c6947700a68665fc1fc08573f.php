<?php /*a:2:{s:52:"D:\www\larray\team\basetp6\view\admin\log\index.html";i:1576136372;s:54:"D:\www\larray\team\basetp6\view\admin\public\main.html";i:1574667809;}*/ ?>
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

<div class="layui-fluid">
    <div class="layui-card">
        <div class="layui-card-header"><?php echo htmlentities($title); ?></div>
        <div class="layui-form layui-card-header layuiadmin-card-header-auto" lay-filter="form1">
            <div class="layui-form-item">
                <div class="layui-inline">
                    <div class="layui-input-inline">
                        <input type="text" name="username" id="username" placeholder="请输入管理员" autocomplete="off"
                               class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <button class="layui-btn" data-type="search">搜索</button>
                    <button class="layui-btn" data-type="all">全部</button>
                </div>
            </div>
        </div>
        <div class="layui-card-body">
            <script type="text/html" id="toolbarDemo">
                <div class="layui-btn-container">
                    <?php if(in_array('admin/Log/form',$ca_path_arr)){?>
                    <button class="layui-btn" lay-event="add"><i class="layui-icon layui-icon-add-1"></i>添加</button>
                    <?php }if(in_array('admin/Log/destroy',$ca_path_arr)){?>
                    <button class="layui-btn layui-btn-danger" lay-event="batchdel"><i class="layui-icon layui-icon-delete"></i>批量删除</button>
                    <?php }?>
                </div>
            </script>
            <table id="dataTable" lay-filter="dataTable"></table>
            <script type="text/html" id="options">
                <?php if(in_array('admin/Log/form',$ca_path_arr)){?>
                <a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="edit"><i class="layui-icon layui-icon-edit"></i>编辑</a>
                <?php }if(in_array('admin/Log/destroy',$ca_path_arr)){?>
                <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del"><i class="layui-icon layui-icon-delete"></i>删除</a>
                <?php }?>
            </script>
        </div>
    </div>
</div>

<script src="/static/admin/layui/layui.js"></script>

<script>
    layui.use(['jquery','table','form','layer'], function(){
        var $ = layui.$,
            form = layui.form,
            table = layui.table,
            layer = layui.layer;
        //角色表格初始化
        table.render({
            elem: '#dataTable',
            height: 'full-180',
            url: "<?php echo url('Log/data'); ?>", //数据接口
            method: "post",
            page: true, //开启分页
            autoSort: true,
            even: true,
            limit: 20,
            toolbar: '#toolbarDemo',
            defaultToolbar: ['filter', 'exports', 'print',{
                title: '加载',
                layEvent: 'reload',
                icon: 'layui-icon-refresh-3',
            }],
            cols: [[
                {type: "checkbox", fixed: "left"},
                {
                    field: 'id',
                    title: '序号',
                    sort: true,
                    width: 80,
                    align: 'center',
                },
                {field: "username", title: "管理员",align: 'center',width:100,},
                {field: "ip",title: "ip地址",align: 'center',width:150,},
                {field: "url", title: "请求链接",align: 'center',},
                {field: "method", title: "请求类型",align: 'center',width:100,},
                {field: "remark", title: "操作行为",align: 'center',},
                {field: "create_time", title: "创建时间",align: 'center',width:160,},
                {title: "操作", width: 150, align: "center", fixed: "right", toolbar: "#options"}
            ]],
            done : function(res, curr, count)
            {
                if (res.count == 0)
                {
                    $(".layui-table-main").html('<div class="layui-none">暂无数据</div>');
                }
            },
            id:'dataTable',
            text: "对不起，加载出现异常！"
        });
        //工具栏事件
        table.on('toolbar(dataTable)', function(obj){
            var checkStatus = table.checkStatus('dataTable');
            checkData = checkStatus.data; //得到选中的数据
            switch(obj.event){
                case 'batchdel':
                    var ids = [];
                    if(checkData.length === 0){
                        return layer.msg('请选择数据', {icon: 2});
                    }
                    if (checkData.length > 0) {
                        $.each(checkData, function (index, element) {
                            ids.push(element.id)
                        })
                    }
                    layer.confirm('确定删除吗？', function(index) {
                        $.post("<?php echo url('Log/destroy'); ?>", {ids: ids}, function (result) {
                            if (result.code == 1) {
                                table.reload('dataTable');
                                layer.close(index);
                                layer.msg(result.msg, {icon: 1});
                            }else{
                                table.reload('dataTable');
                                layer.close(index);
                                layer.msg(result.msg, {icon: 2});
                            }
                        });
                    });
                    break;
                case 'reload':
                    table.reload('dataTable', {
                        page: {curr: 1}
                    });
                    break;
            };
        });

        //监听工具条
        table.on('tool(dataTable)', function (obj) { //注：tool是工具条事件名，dataTable是table原始容器的属性 lay-filter="对应的值"
            var data = obj.data, //获得当前行数据
                layEvent = obj.event; //获得 lay-event 对应的值
            if (layEvent === 'del') {
                layer.confirm('确认删除吗？', function (index) {
                    $.post("<?php echo url('Log/destroy'); ?>", {ids: [data.id]}, function (result) {
                        if (result.code == 1) {
                            obj.del(); //删除对应行（tr）的DOM结构
                            layer.close(index);
                            layer.msg(result.msg, {icon: 1});
                        }else{
                            layer.close(index);
                            layer.msg(result.msg, {icon: 2});
                        }
                    });
                });
            }
        });


        var active = {
            //搜索
            search: function () {
                //执行重载
                table.reload('dataTable', {
                    page: {
                        curr: 1 //重新从第 1 页开始
                    },
                    where: form.val('form1'),
                });
            },
            //全部
            all: function () {
                //执行重载
                table.reload('dataTable', {
                    page: {
                        curr: 1 //重新从第 1 页开始
                    },
                    where: form.val('form1', {username: '',}),
                });
            },
        };
        //点击搜索
        $('.layui-btn').on('click', function(){
            var type = $(this).data('type');
            active[type] ? active[type].call(this) : '';
        });
    });
</script>

</body>
</html>