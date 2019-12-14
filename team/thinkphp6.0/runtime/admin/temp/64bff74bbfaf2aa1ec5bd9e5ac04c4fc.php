<?php /*a:2:{s:54:"D:\www\larray\team\basetp6\view\admin\admin\index.html";i:1576133573;s:54:"D:\www\larray\team\basetp6\view\admin\public\main.html";i:1574667809;}*/ ?>
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
                        <input type="text" name="phone" id="phone" placeholder="请输入手机号" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <div class="layui-input-inline">
                        <select name="sex" id="sex">
                            <option value="">--请选择性别--</option>
                            <option value="1">男</option>
                            <option value="2">女</option>
                        </select>
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
                    <?php if(in_array('admin/Admin/form',$ca_path_arr)){?>
                    <button class="layui-btn" lay-event="add"><i class="layui-icon layui-icon-add-1"></i>添加</button>
                    <?php }if(in_array('admin/Admin/destroy',$ca_path_arr)){?>
                    <button class="layui-btn layui-btn-danger" lay-event="batchdel"><i class="layui-icon layui-icon-delete"></i>批量删除</button>
                    <?php }if(in_array('admin/Admin/import',$ca_path_arr)){?>
                    <button class="layui-btn " lay-event="import">导入Excel</button>
                    <?php }?>
<!--                    <a class="layui-btn layuiadmin-btn-admin " href="<?php echo url('admin/outExcel'); ?>">导出Excel</a>-->
<!--                    <a class="layui-btn layuiadmin-btn-admin " href="<?php echo url('admin/mail'); ?>">发送邮件</a>-->
                </div>
            </script>
            <table id="dataTable" lay-filter="dataTable"></table>
            <script type="text/html" id="picTpl">
                <img style="display: inline-block; width: 50%; height: 100%;" src={{ d.pic }}>
            </script>
            <script type="text/html" id="checkStatus">
                <input type="checkbox" name="{{d.id}}" value="{{d.status}}" lay-skin="switch" lay-text="启用|禁用" lay-filter="status"  {{ d.status== 1 ? 'checked' : '' }}>
            </script>
            <script type="text/html" id="checkAdmin">
                <input type="checkbox" name="{{d.id}}" value="{{d.is_admin}}" lay-skin="switch" lay-text="是|否" lay-filter="is_admin" {{ d.is_admin== 1 ? 'checked' : '' }}>
            </script>
            <script type="text/html" id="options">
                <?php if(in_array('admin/Admin/show',$ca_path_arr)){?>
                <a class="layui-btn layui-bg-cyan layui-btn-xs" lay-event="detail"><i
                        class="layui-icon layui-icon-engine"></i>查看</a>
                <?php }if(in_array('admin/Admin/form',$ca_path_arr)){?>
                <a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="edit"><i
                        class="layui-icon layui-icon-edit"></i>编辑</a>
                <?php }if(in_array('admin/Admin/destroy',$ca_path_arr)){?>
                {{#  if(d.name != 'admin'){ }}
                <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del"><i
                        class="layui-icon layui-icon-delete"></i>删除</a>
                {{#  } }}
                <?php }?>
            </script>
        </div>
    </div>
</div>

<script src="/static/admin/layui/layui.js"></script>

<script>
    layui.use(['jquery', 'table', 'form', 'layer'], function () {
        var $ = layui.$,
            form = layui.form,
            table = layui.table,
            layer = layui.layer;
        //用户表格初始化
        table.render({
            elem: '#dataTable',
            height: 'full-180',
            url: "<?php echo url('admin/data'); ?>", //数据接口
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
                {
                    checkbox: true,
                    fixed: 'left'
                },
                {
                    field: 'id',
                    title: '序号',
                    sort: true,
                    align: 'center',
                    width: 80
                },
                {
                    field: 'pic',
                    title: '头像',
                    align: 'center',
                    templet: '#picTpl',
                    width: 120,
                },
                {
                    field: 'username',
                    title: '账号',
                    align: 'center',
                    width: 120,
                },
                {
                    field: 'fullname',
                    title: '姓名',
                    align: 'center',
                    width: 120,
                },
                {
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
                },
                {field: 'phone', title: '手机', align: 'center', width: 120,edit: "text"},
                {field: 'title', title: '角色类型', align: 'center', width: 160,},
                {field: 'area', title: '地址', align: 'center', width: 200,},
                {field: "status", align: 'center',templet: '#checkStatus', unresize: true, title: "状态"},
                {field: "is_admin", align: 'center',templet: '#checkAdmin', unresize: true, title: "是否管理员"},
                {field: 'create_time', title: '创建时间', align: 'center',width: 160,},
                {title: "操作", width: 220, align: "center",  toolbar: "#options"}
            ]],
            done : function(res, curr, count)
            {
                if (res.count == 0)
                {
                    $(".layui-table-main").html('<div class="layui-none">暂无数据</div>');
                }
            },
            id: "dataTable",
            // where: {
            //     token: layui.data('layuiAdmin').token
            // },
            text: "对不起，加载出现异常！"
        });
        //工具栏事件
        table.on('toolbar(dataTable)', function(obj){
            var checkStatus = table.checkStatus('dataTable'),
                checkData = checkStatus.data; //得到选中的数据
            switch(obj.event){
                case 'add':
                    //添加
                    layer.open({
                        type: 2,
                        title: '添加管理员',
                        content: "<?php echo url('admin/form'); ?>",
                        area: ['90%', '80%'],
                        skin: 'layui-layer-molv',
                        maxmin: true,
                        // btn: ['确定', '取消'],
                        btnAlign: 'c',
                        end: function () {
                            table.reload('dataTable');
                        }
                    });
                    break;
                    //多选删除
                case 'batchdel':
                    var ids = [];
                    if (checkData.length === 0) {
                        return layer.msg('请选择数据');
                    }
                    if (checkData.length > 0) {
                        $.each(checkData, function (index, element) {
                            ids.push(element.id)
                        })
                    }
                    layer.confirm('确定删除吗？', function (index) {
                        $.post("<?php echo url('admin/destroy'); ?>", {_method: 'delete', ids: ids}, function (result) {
                            if (result.code == 1) {
                                table.reload('dataTable');
                                layer.close(index);
                                layer.msg(result.msg, {icon: 1});
                            } else {
                                table.reload('dataTable');
                                layer.close(index);
                                layer.msg(result.msg, {icon: 2});
                            }
                        });
                    });
                    break;
                    //导入Excel
                case 'import':
                    layer.open({
                        type: 2,
                        title: '导入Excel',
                        content: "<?php echo url('admin/import'); ?>",
                        area: ['40%', '40%'],
                        maxmin: true,
                        btn: ['确定', '取消'],
                        btnAlign: 'c',
                        yes: function (index, layero) {
                            var iframeWindow = window['layui-layer-iframe' + index]
                                , submitID = 'submit'
                                , submit = layero.find('iframe').contents().find('#' + submitID);
                            //监听提交
                            iframeWindow.layui.form.on('submit(' + submitID + ')', function (data) {
                                //提交 Ajax 成功后，静态更新表格中的数据
                                layer.msg(JSON.stringify(data.field));
                                var index = layer.msg('提交中，请稍候', {icon: 16, time: false, shade: 0.8});
                                setTimeout(function () {
                                    $.ajax({
                                        type: "post",
                                        url: "<?php echo url('admin/import'); ?>",
                                        data: data.field,
                                        success: function (data) {
                                            if (data['code'] == 1) {
                                                layer.msg(data['msg'],{icon: 1});
                                                setTimeout(function () {
                                                    var index = parent.layer.getFrameIndex(window.name);
                                                    parent.layer.close(index);
                                                    window.location.reload();
                                                    layer.close(index);
                                                    table.reload('dataTable');
                                                }, 1000);
                                            } else {
                                                layer.msg(data['msg'],{icon: 2});
                                            }
                                        }
                                    });
                                }, 2000);
                            });
                            submit.trigger('click');
                        }
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
                    $.post("<?php echo url('admin/destroy'); ?>", {_method: 'delete', ids: [data.id]}, function (result) {
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
            } else if (layEvent === 'edit') {
                layer.open({
                    type: 2,
                    title: '编辑用户信息',
                    content: "<?php echo url('admin/form'); ?>?id=" + data.id,
                    area: ['90%', '80%'],
                    maxmin: true,
                    fixed: false, //不固定
                    closeBtn: 1,
                    end: function () {
                        table.reload('dataTable');
                    }
                });
            } else if (layEvent === 'detail') {
                layer.open({
                    type: 2,
                    title: '用户详情信息',
                    content: "<?php echo url('admin/show'); ?>?id=" + data.id,
                    area: ['90%', '80%'],
                    maxmin: true,
                    btn: ['确定', '取消'],
                    btnAlign: 'c',
                    yes: function (index, layero) {
                        layer.close(index);
                        table.reload('dataTable');
                    }
                });
            }
        });
        form.on('switch(status)', function(data){
            $.post("<?php echo url('state'); ?>",{id:data.elem.name},function(res){
                if(res.code>0){
                    layer.msg(res.msg,{time:1000,icon:1});
                }else{
                    layer.msg(res.msg,{time:1000,icon:2});
                }
                table.reload('dataTable');
            });
        });
        form.on('switch(is_admin)', function(data){
            $.post("<?php echo url('checkAdmin'); ?>",{id:data.elem.name},function(res){
                if(res.code>0){
                    layer.msg(res.msg,{time:1000,icon:1});
                }else{
                    layer.msg(res.msg,{time:1000,icon:2});
                }
                table.reload('dataTable');
            });
        });
        /* 监听单元格编辑 */
        table.on('edit(dataTable)', function(obj){
            $.post("<?php echo url('edit'); ?>",obj.data,function(res){
                if(res.code>0){
                    layer.msg(res.msg,{time:1000,icon:1});
                }else{
                    layer.msg(res.msg,{time:1000,icon:2});
                }
                table.reload('dataTable');
            });
        });
        //监听行双击事件
        table.on('rowDouble(dataTable)', function(obj){
            layer.open({
                type: 2,
                title: '用户详情信息',
                content: "<?php echo url('admin/show'); ?>?id=" + obj.data.id,
                area: ['90%', '80%'],
                maxmin: true,
                btn: ['确定', '取消'],
                btnAlign: 'c',
                yes: function (index, layero) {
                    layer.close(index);
                    table.reload('dataTable');
                }
            });

        });
        //事件
        var active = {
            //搜索
            search: function (data) {
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
                    where: form.val('form1',{username: '', phone: '', sex: '',}),
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