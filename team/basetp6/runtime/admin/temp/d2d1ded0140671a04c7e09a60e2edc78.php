<?php /*a:2:{s:55:"D:\www\larray\team\basetp6\view\admin\system\index.html";i:1575875202;s:54:"D:\www\larray\team\basetp6\view\admin\public\main.html";i:1574667809;}*/ ?>
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
        <div class="layui-tab">
            <ul class="layui-tab-title">
                <li class="layui-this">网站设置</li>
                <li>邮件设置</li>
            </ul>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <div class="layui-row layui-col-space15">
                        <div class="layui-card-body" pad15>
                            <div class="layui-form" wid100 lay-filter="">
                                <div class="layui-form-item">
                                    <label class="layui-form-label">网站名称</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="sitename" value="layuiAdmin" class="layui-input">
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">网站域名</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="domain" lay-verify="url" value="http://www.layui.com" class="layui-input">
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">缓存时间</label>
                                    <div class="layui-input-inline" style="width: 80px;">
                                        <input type="text" name="cache" lay-verify="number" value="0" class="layui-input">
                                    </div>
                                    <div class="layui-input-inline layui-input-company">分钟</div>
                                    <div class="layui-form-mid layui-word-aux">本地开发一般推荐设置为 0，线上环境建议设置为 10。</div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">最大文件上传</label>
                                    <div class="layui-input-inline" style="width: 80px;">
                                        <input type="text" name="cache" lay-verify="number" value="2048" class="layui-input">
                                    </div>
                                    <div class="layui-input-inline layui-input-company">KB</div>
                                    <div class="layui-form-mid layui-word-aux">提示：1 M = 1024 KB</div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">上传文件类型</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="cache" value="png|gif|jpg|jpeg|zip|rar" class="layui-input">
                                    </div>
                                </div>
                                <div class="layui-form-item layui-form-text">
                                    <label class="layui-form-label">首页标题</label>
                                    <div class="layui-input-block">
                                        <textarea name="title" class="layui-textarea">layuiAdmin 通用后台管理模板系统</textarea>
                                    </div>
                                </div>
                                <div class="layui-form-item layui-form-text">
                                    <label class="layui-form-label">META关键词</label>
                                    <div class="layui-input-block">
                                        <textarea name="keywords" class="layui-textarea" placeholder="多个关键词用英文状态 , 号分割"></textarea>
                                    </div>
                                </div>
                                <div class="layui-form-item layui-form-text">
                                    <label class="layui-form-label">META描述</label>
                                    <div class="layui-input-block">
                                        <textarea name="descript" class="layui-textarea">layuiAdmin 是 layui 官方出品的通用型后台模板解决方案，提供了单页版和 iframe 版两种开发模式。layuiAdmin 是目前非常流行的后台模板框架，广泛用于各类管理平台。</textarea>
                                    </div>
                                </div>
                                <div class="layui-form-item layui-form-text">
                                    <label class="layui-form-label">版权信息</label>
                                    <div class="layui-input-block">
                                        <textarea name="copyright" class="layui-textarea">© 2018 layui.com MIT license</textarea>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <div class="layui-input-block">
                                        <button class="layui-btn" lay-submit lay-filter="set_website">确认保存</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="layui-tab-item">
                    <div class="layui-row layui-col-space15">
                        <div class="layui-card-body" pad15>
                            <div class="layui-form" wid100 lay-filter="">
                                <div class="layui-form-item">
                                    <label class="layui-form-label">网站名称</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="sitename" value="layuiAdmin" class="layui-input">
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">网站域名</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="domain" lay-verify="url" value="http://www.layui.com" class="layui-input">
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">缓存时间</label>
                                    <div class="layui-input-inline" style="width: 80px;">
                                        <input type="text" name="cache" lay-verify="number" value="0" class="layui-input">
                                    </div>
                                    <div class="layui-input-inline layui-input-company">分钟</div>
                                    <div class="layui-form-mid layui-word-aux">本地开发一般推荐设置为 0，线上环境建议设置为 10。</div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">最大文件上传</label>
                                    <div class="layui-input-inline" style="width: 80px;">
                                        <input type="text" name="cache" lay-verify="number" value="2048" class="layui-input">
                                    </div>
                                    <div class="layui-input-inline layui-input-company">KB</div>
                                    <div class="layui-form-mid layui-word-aux">提示：1 M = 1024 KB</div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">上传文件类型</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="cache" value="png|gif|jpg|jpeg|zip|rar" class="layui-input">
                                    </div>
                                </div>
                                <div class="layui-form-item layui-form-text">
                                    <label class="layui-form-label">首页标题</label>
                                    <div class="layui-input-block">
                                        <textarea name="title" class="layui-textarea">layuiAdmin 通用后台管理模板系统</textarea>
                                    </div>
                                </div>
                                <div class="layui-form-item layui-form-text">
                                    <label class="layui-form-label">META关键词</label>
                                    <div class="layui-input-block">
                                        <textarea name="keywords" class="layui-textarea" placeholder="多个关键词用英文状态 , 号分割"></textarea>
                                    </div>
                                </div>
                                <div class="layui-form-item layui-form-text">
                                    <label class="layui-form-label">META描述</label>
                                    <div class="layui-input-block">
                                        <textarea name="descript" class="layui-textarea">layuiAdmin 是 layui 官方出品的通用型后台模板解决方案，提供了单页版和 iframe 版两种开发模式。layuiAdmin 是目前非常流行的后台模板框架，广泛用于各类管理平台。</textarea>
                                    </div>
                                </div>
                                <div class="layui-form-item layui-form-text">
                                    <label class="layui-form-label">版权信息</label>
                                    <div class="layui-input-block">
                                        <textarea name="copyright" class="layui-textarea">© 2018 layui.com MIT license</textarea>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <div class="layui-input-block">
                                        <button class="layui-btn" lay-submit lay-filter="set_website">确认保存</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--<div class="layui-tab">
            <ul class="layui-tab-title">
                <li class="layui-this">网站设置</li>
                <li>用户管理</li>
            </ul>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">内容1</div>
                <div class="layui-tab-item">内容2</div>
            </div>
        </div>-->
    </div>
</div>

<script src="/static/admin/layui/layui.js"></script>

<script>
    layui.use(['jquery','table','form','layer','element'], function(){
        var $ = layui.$,
            form = layui.form,
            table = layui.table,
            element = layui.element,
            layer = layui.layer;
        //表格初始化
        table.render({
            elem: '#dataTable',
            height: 'full-180',
            url: "<?php echo url('AuthGroup/data'); ?>", //数据接口
            method: "post",
            page: true, //开启分页
            autoSort: true,
            loading: false,
            totalRow: true,
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
                {field: "title", title: "角色名称",align: 'center',},
                {field: "status", align: 'center',templet: '#checkStatus', unresize: true, title: "状态"},
                {field: "create_time", title: "创建时间",align: 'center',},
                {title: "操作", width: 350, align: "center", fixed: "right", toolbar: "#options"}
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
                case 'add':
                    //添加
                    layer.open({
                        type: 2,
                        title: '添加角色',
                        content: "<?php echo url('AuthGroup/form'); ?>",
                        area: ['400px', '270px'],
                        maxmin: true,
                        btn: ['确定', '取消'],
                        btnAlign: 'c',
                        yes: function(index, layero){
                            var iframeWindow = window['layui-layer-iframe'+ index]
                                ,submitID = 'submit'
                                ,submit = layero.find('iframe').contents().find('#'+ submitID);
                            //监听提交
                            iframeWindow.layui.form.on('submit('+ submitID +')', function(data){
                                //提交 Ajax 成功后，静态更新表格中的数据
                                layer.msg(JSON.stringify(data.field));
                                var index = layer.msg('提交中，请稍候', {icon: 16, time: false, shade: 0.8});
                                setTimeout(function () {
                                    $.ajax({
                                        type: "post",
                                        url: "<?php echo url('AuthGroup/form'); ?>",
                                        data: data.field,
                                        success: function (data) {
                                            if (data['code'] == 1) {
                                                layer.msg(data['msg'], {icon: 1});
                                                setTimeout(function () {
                                                    var index = parent.layer.getFrameIndex(window.name);
                                                    parent.layer.close(index);
                                                    window.location.reload();
                                                    layer.close(index);
                                                    table.reload('dataTable');
                                                }, 1000);
                                            } else {
                                                layer.msg(data['msg'], {icon: 2});
                                            }
                                        }
                                    });
                                }, 2000);
                            });
                            submit.trigger('click');
                        }
                    });
                    break;
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
                        $.post("<?php echo url('AuthGroup/destroy'); ?>", {_method: 'delete', ids: ids}, function (result) {
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
                    $.post("<?php echo url('AuthGroup/destroy'); ?>", {_method: 'delete', ids: [data.id]}, function (result) {
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
                    title: '编辑角色信息',
                    content: "<?php echo url('AuthGroup/form'); ?>?id=" + data.id,
                    area: ['30%', '40%'],
                    maxmin: true,
                    btn: ['确定', '取消'],
                    btnAlign: 'c',
                    yes: function(index, layero){
                        var iframeWindow = window['layui-layer-iframe'+ index]
                            ,submitID = 'submit'
                            ,submit = layero.find('iframe').contents().find('#'+ submitID);
                        //监听提交
                        iframeWindow.layui.form.on('submit('+ submitID +')', function(data){
                            //提交 Ajax 成功后，静态更新表格中的数据
                            layer.msg(JSON.stringify(data.field));
                            var index = layer.msg('提交中，请稍候', {icon: 16, time: false, shade: 0.8});
                            setTimeout(function () {
                                $.ajax({
                                    type: "post",
                                    url: "<?php echo url('AuthGroup/form'); ?>",
                                    data: data.field,
                                    success: function (data) {
                                        if (data['code'] == 1) {
                                            layer.msg(data['msg'], {icon: 1});
                                            setTimeout(function () {
                                                var index = parent.layer.getFrameIndex(window.name);
                                                parent.layer.close(index);
                                                window.location.reload();
                                                layer.close(index);
                                                table.reload('dataTable');
                                            }, 1000);
                                        } else {
                                            layer.msg(data['msg'], {icon: 2});
                                        }
                                    }
                                });
                            }, 2000);
                        });
                        submit.trigger('click');
                    }
                });
            }else if (layEvent === 'perm') {
                layer.open({
                    type: 2,
                    title: '编辑赋权信息',
                    content: "<?php echo url('AuthGroup/power'); ?>?id=" + data.id,
                    area: ['90%', '70%'],
                    maxmin: true,
                    btn: ['确定', '取消'],
                    btnAlign: 'c',
                    yes: function(index, layero){
                        var iframeWindow = window['layui-layer-iframe'+ index]
                            ,submitID = 'submit'
                            ,submit = layero.find('iframe').contents().find('#'+ submitID);
                        //监听提交
                        iframeWindow.layui.form.on('submit('+ submitID +')', function(data){
                            //提交 Ajax 成功后，静态更新表格中的数据
                            layer.msg(JSON.stringify(data.field));
                            var index = layer.msg('提交中，请稍候', {icon: 16, time: false, shade: 0.8});
                            setTimeout(function () {
                                $.ajax({
                                    type: "post",
                                    url: "<?php echo url('AuthGroup/power'); ?>",
                                    data: data.field,
                                    success: function (data) {
                                        if (data['code'] == 1) {
                                            layer.msg(data['msg'], {icon: 1});
                                            setTimeout(function () {
                                                var index = parent.layer.getFrameIndex(window.name);
                                                parent.layer.close(index);
                                                window.location.reload();
                                                layer.close(index);
                                                table.reload('dataTable');
                                            }, 1000);
                                        } else {
                                            layer.msg(data['msg'], {icon: 2});
                                        }
                                    }
                                });
                            }, 2000);
                        });
                        submit.trigger('click');
                    }
                });
            }
        });


        //监听状态修改
        form.on('switch(status)', function(data){
            loading =layer.load(1, {shade: [0.1,'#fff']});
            $.post("<?php echo url('state'); ?>",{id:data.elem.name},function(res){
                layer.close(loading);
                if(res.code>0){
                    layer.msg(res.msg,{time:1000,icon:1});
                }else{
                    layer.msg(res.msg,{time:1000,icon:2});
                }
            });
        });

        var active = {
            //搜索
            search: function () {
                //执行重载
                table.reload('dataTable', {
                    page: {
                        curr: 1 //重新从第 1 页开始
                    },
                    where: {
                        title: $('#title').val(),
                    }
                });
            },
            //全部
            all: function () {
                //执行重载
                table.reload('dataTable', {
                    page: {
                        curr: 1 //重新从第 1 页开始
                    },
                    where: {
                        title: '',
                    }
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