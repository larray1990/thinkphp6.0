<?php /*a:2:{s:61:"D:\www\larray\team\cms\application\admin\view\admin\form.html";i:1572860326;s:62:"D:\www\larray\team\cms\application\admin\view\public\base.html";i:1572596874;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>>标题</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/static/admin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/static/admin/css/admin.css" media="all">
</head>
<body>

<div class="layui-fluid">
    <div class="layui-card layui-row layui-col-space15">
        <form class="layui-form"
              style="padding: 20px 0 0 0;">
            <div class="layui-form-item">
                <label class="layui-form-label">账号：</label>
                <div class="layui-input-inline">
                    <input type="text" name="name" placeholder="请输入账号" autocomplete="off" lay-verify="required" value="<?php echo htmlentities($info['name']); ?>"
                            class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux"><b style="color: red;">★ 必填</b></div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">密码：</label>
                <div class="layui-input-inline">
                    <input type="password" name="password" placeholder="请输入密码" value="<?php echo htmlentities($info['password']); ?>"
                           lay-verify="required" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux"><b style="color: red;">★请输入6~16个字符，区分大小写</b></div>
            </div>
            <?php echo token(); ?>
            <div class="layui-form-item">
                <label class="layui-form-label">姓名：</label>
                <div class="layui-input-inline">
                    <input type="text" name="contacts" autocomplete="off" lay-verify="required" placeholder="请输入姓名"
                           value="<?php echo htmlentities($info['contacts']); ?>" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux"><b style="color: red;">★</b> 必填</div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">性别：</label>
                <div class="layui-input-inline">
                    <input type="radio" name="sex" <?php if($info['sex'] == '1'): ?>checked="" <?php else: ?>checked=""<?php endif; ?>
                    title="男" value="1" >
                    <input type="radio" name="sex" <?php if($info['sex'] == '2'): ?>checked="" <?php else: ?><?php endif; ?> title="女"
                    value="2">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">头像：</label>
                <div class="layui-input-block">
                    <div class="layui-upload">
                        <button type="button" class="layui-btn" id="uploadImg">上传图片</button>
                        <input type="hidden" name="pic" id="uploadImg2" value="<?php echo htmlentities($info['pic']); ?>" lay-verify="required">
                        <div class="layui-upload-list">
                            <img class="layui-upload-img" id="uploadImg3" src="<?php echo htmlentities($info['pic']); ?>" style="height: 100%">
                            <input type="hidden" name="file_name" id="file_name" value="<?php echo htmlentities($info['file_name']); ?>"
                                   lay-verify="required">
                            <p id="uploadImgText"></p>
                        </div>
                    </div>
                    <div class="layui-progress layui-progress-big" lay-filter="demo" lay-showPercent="false">
                        <div class="layui-progress-bar" lay-percent="0%"></div>
                    </div>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">选择地区：</label>
                <div class="layui-input-block">
                    <div class="layui-input-inline">
                        <select name="province" lay-filter="province">
                            <option value="">请选择省</option>
                        </select>
                    </div>
                    <div class="layui-input-inline">
                        <select name="city" lay-filter="city">
                            <option value="">请选择市</option>
                        </select>
                    </div>
                    <div class="layui-input-inline">
                        <select name="county" lay-filter="county">
                            <option value="">请选择县/区</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">办公电话：</label>
                <div class="layui-input-inline">
                    <input type="text" name="office_phone" lay-verify="required" autocomplete="off"
                           placeholder="请输入办公室电话" value="<?php echo htmlentities($info['office_phone']); ?>" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">手机号码：</label>
                <div class="layui-input-inline">
                    <input type="text" name="phone" lay-verify="phone|required" autocomplete="off" placeholder="请输入手机号码"
                           value="<?php echo htmlentities($info['phone']); ?>" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">电子邮箱：</label>
                <div class="layui-input-inline">
                    <input type="text" name="email" lay-verify="email|required" autocomplete="off" placeholder="请输入电子邮箱"
                           value="<?php echo htmlentities($info['email']); ?>" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">角色类型：</label>
                <div class="layui-input-inline">
                    <select name="role_id" lay-verify="required" lay-search="">
                        <option value="">--请选择角色--</option>
                        <?php if(is_array($role) || $role instanceof \think\Collection || $role instanceof \think\Paginator): if( count($role)==0 ) : echo "" ;else: foreach($role as $key=>$rl): ?>
                        <option <?php if($info['role_id'] == $rl['id']): ?>selected<?php endif; ?> value="<?php echo htmlentities($rl['id']); ?>"><?php echo htmlentities($rl['name']); ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
            </div>
            <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">备注：</label>
                <div class="layui-input-block">
                    <textarea placeholder="请输入备注" name="remarks" lay-verify="content" id="remarks" class="layui-textarea"><?php echo htmlentities($info['remarks']); ?></textarea>
                </div>
            </div>
            <input type="hidden" name="id" value="<?php echo htmlentities($info['id']); ?>">
            <div class="layui-form-item layui-layer-btn-c">
                <div class="layui-input-block">
                    <button class="layui-btn layui-layer-btn0" lay-submit="" lay-filter="demo">提交</button>
                </div>
            </div>
            <!--<div class="layui-form-item layui-layer-btn layui-layer-btn-c">
                <a class="layui-layer-btn0" lay-filter="demo">确定</a>
                <a class="layui-layer-btn1">取消</a>
            </div>-->
            <span style="display: none;" id="province"><?php echo htmlentities($info['province']); ?></span>
            <span style="display: none;" id="city"><?php echo htmlentities($info['city']); ?></span>
            <span style="display: none;" id="county"><?php echo htmlentities($info['county']); ?></span>
        </form>
    </div>
</div>

<script src="/static/admin/layui/layui.js"></script>

<script src="/static/admin/lib/extend/select/jquery-1.12.4.js"></script>
<script type="text/javascript" src="/static/admin/lib/extend/select/data.js"></script>
<script type="text/javascript" src="/static/admin/lib/extend/select/province.js"></script>
<script src='/static/admin/lib/extend/tinymce/tinymce.js'></script>
<script>
    tinymce.init({
        selector: '#remarks',
        language:'zh_CN',
        plugins: 'print preview searchreplace autolink directionality visualblocks visualchars fullscreen image link media template code codesample table charmap hr pagebreak nonbreaking anchor insertdatetime advlist lists wordcount imagetools textpattern help paste emoticons autosave bdmap indent2em autoresize lineheight',
        toolbar: 'code undo redo restoredraft | cut copy paste pastetext | forecolor backcolor bold italic underline strikethrough link anchor | alignleft aligncenter alignright alignjustify outdent indent | \
                     styleselect formatselect fontselect fontsizeselect | bullist numlist | blockquote subscript superscript removeformat | \
                     table image media charmap emoticons hr pagebreak insertdatetime print preview | fullscreen | bdmap indent2em lineheight',
        height: 650, //编辑器高度
        min_height: 400,
        /*content_css: [ //可设置编辑区内容展示的css，谨慎使用
            '/static/reset.css',
            '/static/ax.css',
            '/static/css.css',
        ],*/
        fontsize_formats: '12px 14px 16px 18px 24px 36px 48px 56px 72px',
        font_formats: '微软雅黑=Microsoft YaHei,Helvetica Neue,PingFang SC,sans-serif;苹果苹方=PingFang SC,Microsoft YaHei,sans-serif;宋体=simsun,serif;仿宋体=FangSong,serif;黑体=SimHei,sans-serif;Arial=arial,helvetica,sans-serif;Arial Black=arial black,avant garde;Book Antiqua=book antiqua,palatino;Comic Sans MS=comic sans ms,sans-serif;Courier New=courier new,courier;Georgia=georgia,palatino;Helvetica=helvetica;Impact=impact,chicago;Symbol=symbol;Tahoma=tahoma,arial,helvetica,sans-serif;Terminal=terminal,monaco;Times New Roman=times new roman,times;Verdana=verdana,geneva;Webdings=webdings;Wingdings=wingdings,zapf dingbats;知乎配置=BlinkMacSystemFont, Helvetica Neue, PingFang SC, Microsoft YaHei, Source Han Sans SC, Noto Sans CJK SC, WenQuanYi Micro Hei, sans-serif;小米配置=Helvetica Neue,Helvetica,Arial,Microsoft Yahei,Hiragino Sans GB,Heiti SC,WenQuanYi Micro Hei,sans-serif',
        importcss_append: true,
        file_picker_callback: function(callback, value, meta) {
            if (meta.filetype == 'image') {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', '.jpg,.png,.gif,.bmp,.jpeg');
                input.click();
                input.onchange = function () {
                    var file = this.files[0];
                    var xhr, formData;
                    xhr = new XMLHttpRequest();
                    xhr.withCredentials = false;
                    xhr.open('POST', "<?php echo url('api/Upload/uploadImage'); ?>");
                    xhr.onload = function () {
                        var json;
                        if (xhr.status != 200) {
                            alert('HTTP Error: ' + xhr.status);
                            return;
                        }
                        json = JSON.parse(xhr.responseText);
                        if (!json || typeof json.data.src != 'string') {
                            alert('Invalid JSON: ' + xhr.responseText);
                            return;
                        }
                        callback(json.data.src, {alt: json.data.name});
                    };
                    formData = new FormData();
                    formData.append('file', file, file.name);
                    xhr.send(formData);
                }
            }
            if (meta.filetype == 'file') {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', '.docx,.doc,.xlsx,.xls,.zip');
                input.click();
                input.onchange = function () {
                    var file = this.files[0];
                    var xhr, formData;
                    xhr = new XMLHttpRequest();
                    xhr.withCredentials = false;
                    xhr.open('POST', "<?php echo url('api/Upload/uploadFiles'); ?>");
                    xhr.onload = function () {
                        var json;
                        if (xhr.status != 200) {
                            alert('HTTP Error: ' + xhr.status);
                            return;
                        }
                        json = JSON.parse(xhr.responseText);
                        if (!json || typeof json.data.src != 'string') {
                            alert('Invalid JSON: ' + xhr.responseText);
                            return;
                        }
                        callback(json.data.src, {alt: json.data.name});
                    };
                    formData = new FormData();
                    formData.append('file', file, file.name);
                    xhr.send(formData);
                }
            }
            if (meta.filetype == 'media') {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', '.mp4,.flv,.avi,.rm,.rmvb');
                input.click();
                input.onchange = function () {
                    var file = this.files[0];
                    var xhr, formData;
                    xhr = new XMLHttpRequest();
                    xhr.withCredentials = false;
                    xhr.open('POST', "<?php echo url('api/Upload/uploadVideo'); ?>");
                    xhr.onload = function () {
                        var json;
                        if (xhr.status != 200) {
                            alert('HTTP Error: ' + xhr.status);
                            return;
                        }
                        json = JSON.parse(xhr.responseText);
                        if (!json || typeof json.data.src != 'string') {
                            alert('Invalid JSON: ' + xhr.responseText);
                            return;
                        }
                        callback(json.data.src, {alt: json.data.name});
                    };
                    formData = new FormData();
                    formData.append('file', file, file.name);
                    xhr.send(formData);
                }
            }
        },
        template_cdate_format: '[CDATE: %m/%d/%Y : %H:%M:%S]',
        template_mdate_format: '[MDATE: %m/%d/%Y : %H:%M:%S]',
        autosave_ask_before_unload: false,
        toolbar_drawer : false,
    });
</script>
<script type="text/javascript">
    var defaults = {
        s1: 'province',
        s2: 'city',
        s3: 'county',
        v1: $('#province').text(),
        v2: $('#city').text(),
        v3: $('#county').text()
    };
</script>
<script>
    layui.use(['form', 'upload','element'], function () {
        var $ = layui.$,
            element = layui.element,
            form = layui.form,
            upload = layui.upload;
        var uploadInst = upload.render({
            elem: '#uploadImg',
            url: "<?php echo url('api/Upload/uploadImage'); ?>",
            accept: 'images',
            acceptMime: 'image/*',
            exts: 'jpg|png|gif|bmp|jpeg',
            before: function (obj) {
                //预读本地文件示例，不支持ie8
                obj.preview(function (index, file, result) {
                    $('#uploadImg3').attr('src', result); //图片链接（base64）
                });
            },
            done: function (res) {
                if (res.code == 0) {
                    $('#uploadImg2').val(res.data.src);
                    $('#file_name').val(res.data.name);
                    $('#uploadImg3').attr('src', res.data.src);
                } else {
                    return layer.msg('上传文件类型为：jpg,png,gif，且大小不能超过8M', {icon: 2})
                }
                //上传成功
            },
            error: function () {
                //演示失败状态，并实现重传
                var demoText = $('#uploadImgText');
                demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-mini demo-reload">重试</a>');
                demoText.find('.demo-reload').on('click', function () {
                    uploadInst.upload();
                });
            },
            progress: function(n){
                var percent = n + '%' //获取进度百分比
                element.progress('demo', percent); //可配合 layui 进度条元素使用
            }
        });
        //监听提交
        form.on('submit(demo)', function (data) {
            data.field.remarks=tinyMCE.editors["remarks"].getContent();
            layer.msg(JSON.stringify(data.field));
            var index = layer.msg('提交中，请稍候', {icon: 16, time: false, shade: 0.8});
            setTimeout(function () {
                $.ajax({
                    type: "post",
                    url: "<?php echo url('admin/form'); ?>",
                    data: data.field,
                    success: function (res) {
                        if (res['code'] == 1) {
                            layer.msg(res['msg']);
                            setTimeout(function () {
                                var index = parent.layer.getFrameIndex(window.name);
                                parent.layer.close(index);
                                window.location.reload();
                            }, 1000);
                        } else {
                            layer.msg(res['msg']);
                        }
                    }
                });
            }, 2000);
            return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
        });
    });
</script>

</body>
</html>