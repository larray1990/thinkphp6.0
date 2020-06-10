layui.define(['laydate', 'form', 'layer', 'table', 'laytpl', 'jquery', 'upload', 'tinymceTextarea'], function (exports) {
    var form = layui.form,
        layer = parent.layer === undefined ? layui.layer : top.layer,
        laytpl = layui.laytpl,
        table = layui.table,
        laydate = layui.laydate,
        upload = layui.upload,
        tinymceTextarea = layui.tinymceTextarea,
        $ = layui.jquery;
    var self = this,
        $body = $('body'),
        elem = $('table').attr('id');
    this.shade = [0.02, '#000'];
    this.dialogIndexs = [];
    //关闭消息框
    this.close = function (index) {
        return layer.close(index);
    };
    //弹出警告消息框
    this.alert = function (msg, callback) {
        var index = layer.alert(msg, {
            end: callback,
            scrollbar: false
        });
        return this.dialogIndexs.push(index), index;
    };
    //确认对话框
    this.confirm = function (msg, title, ok, no) {
        var index = layer.confirm(msg, {
            title: title == '' ? '信息' : title,
            btn: ['确认', '取消']
        }, function () {
            typeof ok === 'function' && ok.call(this);
        }, function () {
            typeof no === 'function' && no.call(this);
            self.close(index);
        });
        return index;
    };
    // 显示成功类型的消息
    this.success_msg = function (msg, callback) {
        if (callback == undefined) {
            callback = function () {}
        }
        var index = layer.msg(msg, {
            icon: 1,
            shade: this.shade,
        }, callback);
        return this.dialogIndexs.push(index), index;
    };
    //显示失败类型的消息
    this.error_msg = function (msg, callback) {
        if (callback == undefined) {
            callback = function () {}
        }
        var index = layer.msg(msg, {
            icon: 2,
            shade: this.shade,
        }, callback);
        return this.dialogIndexs.push(index), index;
    };
    //状态消息提示
    this.tips = function (msg, time, callback) {
        var index = layer.msg(msg, {
            time: (time || 3) * 1000,
            shade: this.shade,
            end: callback,
            shadeClose: true
        });
        return this.dialogIndexs.push(index), index;
    };
    //显示正在加载中的提示
    this.loading = function (msg, callback) {
        var index = msg ? layer.msg(msg, {
            icon: 16,
            scrollbar: false,
            shade: this.shade,
            time: 0,
            end: callback
        }) : layer.load(2, {
            time: 0,
            scrollbar: false,
            shade: this.shade,
            end: callback
        });
        return this.dialogIndexs.push(index), index;
    };
    this.closeFrame = function () {
        var index = parent.layer.getFrameIndex(window.name);
        parent.layer.close(index);
    };
    //刷新当前弹出层
    this.reload = function (type = '') {
        if (type == 'open') {
            var index = parent.layer.getFrameIndex(window.name);
            parent.location.reload();
        } else {
            window.location.reload();
        }
    };
    //判断数组是否为空
    this.isEmptyArray = function (array) {
        for (var x in array) {
            key = x; //键
            value = array[x]; //值
            if (value != '') return false;
        }
        return true;
    };
    this.ajax = function (type = 'post', url, data, callback, isReload = false, dataType = 'json') {
        var lod = loading('正在加载，请稍等！');
        $.ajax({
            url: url,
            type: type,
            dataType: dataType,
            data: data,
            timeout: false,
            success: function (res) {
                close(lod);
                if (res.code == '01') {
                    success_msg(res.msg);
                    if (isReload == true) {
                        setTimeout(function () {
                            closeFrame();
                            reload();
                        }, 1000);
                    }
                    callback(res);
                } else if(res.code == '00'){
                    callback(res);
                }else {
                    error_msg(res.msg);
                }
            },
            error: function (xhr, textstatus, thrown) {
                error_msg('Status:' + xhr.status + '，' + xhr.statusText + '，请稍后再试！');
                if (isReload == true) {
                    reload();
                }
            }
        });
    };
    this.post = function (url, data, callback, isReload = false) {
        ajax('POST', url, data, callback, isReload);
    };
    //get请求
    this.get = function (url, data, callback, isReload = false) {
        ajax('GET', url, data, callback, isReload);
    };
    this.open = function (title, url, width, height, callback, isFull = false) {
        var index = layui.layer.open({
            title: title,
            type: 2,
            area: [width, height],
            maxmin: true,
            content: url,
            success: function (layero, index) {
                var body = layui.layer.getChildFrame('body', index);
            },
            end: callback,
        });
        if (width == undefined || height == undefined) {
            layui.layer.full(index);
        }
        //改变窗口大小时，重置弹窗的宽高，防止超出可视区域（如F12调出debug的操作）
        if (isFull) {
            $(window).on("resize", function () {
                layui.layer.full(index);
            });
        }
    };
    this.year = function (recog) {
        laydate.render({
            elem: '#' + recog,
            type: 'year'
        });
    }
    //年月选择器
    this.month = function (recog) {
        laydate.render({
            elem: '#' + recog,
            type: 'month'
        });
    }
    //时间选择器
    this.time = function (recog) {
        laydate.render({
            elem: '#' + recog,
            type: 'time'
        });
    }
    //日期时间选择器
    this.datetime = function (recog) {
        laydate.render({
            elem: '#' + recog,
            type: 'datetime'
        });
    }
    //日期范围
    this.range = function (recog) {
        laydate.render({
            elem: '#' + recog,
            range: '~'
        });
    };

    /**
     * 渲染图片列表
     * @param type
     */
    this.imageRender = function (divId, type = 'one') {
        var $uploadParent = $("#" + divId);
        var $inputParent = $uploadParent.children('input');
        var $parent = $uploadParent.children('div');
        var url = $inputParent.attr('value');
        if (url == '' || url == undefined) return false;
        if (type == 'one') {
            var style = 'background-image: url("' + url + '");';
            $parent.attr('style', style);
            $parent.attr('data-upload-image', 'one');
        } else {
            var url_array = url.split("|"); //所有图片url数组
            var upload_id = $inputParent.attr('id');
            var upload_class = $parent.attr('class');
            var upload_style = $parent.attr('style');
            var uploadDiv = document.getElementById(divId);
            var upload_id_html = '<input type="hidden" id="' + upload_id + '" value="' + url + '">';
            var upload_image_html = '<div class="' + upload_class + '" data-upload-image="more" data-upload-id="' + upload_id + '" data-upload-div="' + divId + '" style="' + upload_style + '"> </div>';
            var html = '';
            //对新的所有图片url进行重新拼接
            $.each(url_array, function (index, value, arr) {
                html = html + '<div class="' + upload_class + '" data-upload-url="' + value + '" style="background-image: url(' + value + ');"> <em class="layui-icon upload-icon-tip" style="float: right; display: none;">&#x1006;</em> </div>';
            })
            uploadDiv.innerHTML = upload_id_html + html + upload_image_html;
        }
        $.form.imageListen();
        return false;
    }

    /**
     * 上传图片监听器
     * @param id
     */
    this.imageListen = function (id) {
        //对删除图片的显示隐藏操作
        $(".uploadimage").hover(function () {
            $(this).children('em').show();
        }, function () {
            $(this).children('em').hide();
        })

        //删除图片操作
        $('.upload-icon-tip').on('click', function () {
            //获取操作元素对象
            var $parent = $(this).parent('div');
            var $uploadParent = $parent.parent('div');
            var $inputParent = $uploadParent.children('input');

            var current_upload_url = $parent.attr('data-upload-url'); //当前图片url
            var all_upload_url = $inputParent.attr('value'); //所有图片url
            var all_upload_url_array = all_upload_url.split("|"); //所有图片url数组
            var all_upload_url_new = ''; //新的所有图片url

            //对新的所有图片url进行重新拼接
            $.each(all_upload_url_array, function (index, vaule, arr) {
                if (vaule != current_upload_url) {
                    if (all_upload_url_new == '') {
                        all_upload_url_new = vaule;
                    } else {
                        all_upload_url_new = all_upload_url_new + '|' + vaule;
                    }
                }
            })

            //进行图片删除操作
            var dialogIndex = $.msg.confirm('确定要移除这张图片吗？', function () {
                $inputParent.attr('value', all_upload_url_new);
                $parent.remove();
                $.msg.close(dialogIndex);
            });
        });
    }

    /**
     * 放大图片
     */
    $body.on('click', '[data-image]', function () {
        layer.photos({
            photos: $(this).parents('tr'),
            anim: 5
        });
        return false;
    });

    /**
     * 多图片上传放大图片
     */
    $body.on('click', '[data-upload-url]', function () {
        var url = $(this).attr('data-upload-url');
        console.log(url);
        var img = new Image();
        img.src = url;
        var width = img.width + 'px';
        var height = (img.height + 45) + 'px';
        if (url == '' || url == undefined) {
            $.form.msg('数据有误！');
            return false;
        } else {
            layer.open({
                title: "查看图片",
                type: 2,
                area: [width, height],
                content: url,
            })
        }
        return false;
    });

    /**
     * 注册 data-open 事件
     * 用于关闭弹出层
     */
    $body.on('click', '[data-close]', function () {
        closeFrame();
    });

    //工具栏事件
    table.on('toolbar(' + elem + ')', function (obj) {
        var checkStatus = table.checkStatus(obj.config.id),
            checkData = checkStatus.data, //得到选中的数据
            title = $(this).attr('data-title'),
            url = $(this).attr('data-url'),
            width = $(this).attr('data-width'),
            height = $(this).attr('data-height');
        switch (obj.event) {
            case 'add':
                open(title, url, width, height, function () {
                    table.reload(obj.config.id);
                });
                break;
            case 'batchdel':
                var ids = [];
                if (checkData.length === 0) {
                    return error_msg('请选择数据');
                }
                if (checkData.length > 0) {
                    $.each(checkData, function (index, element) {
                        ids.push(element.id)
                    })
                }
                confirm(title, '', function (index) {
                    post(url, {
                        id: ids
                    }, function (res) {
                        table.reload(obj.config.id);
                    }, false);
                });
                break;
            case 'export':
                var whereData = form.val(obj.config.id);
                whereData.type = 1;
                post(obj.config.url, whereData, function (res) {
                    table.exportFile(obj.config.id, res.data, 'xls');
                }, true);
                break;
            case 'reload':
                table.reload(obj.config.id, {
                    page: {
                        curr: 1
                    }
                });
                break;
        };
    });

    //监听工具条
    table.on('tool(' + elem + ')', function (obj) { //注：tool是工具条事件名，dataTable是table原始容器的属性 lay-filter="对应的值"
        var data = obj.data, //获得当前行数据
            layEvent = obj.event, //获得 lay-event 对应的值
            title = $(this).attr('data-title'),
            url = $(this).attr('data-url'),
            width = $(this).attr('data-width'),
            height = $(this).attr('data-height'),
            tableId = $(this).attr('data-table-id');
        if (layEvent === 'del') {
            confirm(title, '', function (index) {
                post(url, {
                    id: data.id
                }, function (res) {
                    table.reload(tableId);
                }, false);
            });
        } else if (layEvent === 'edit') {
            open(title, url, width, height, function () {
                table.reload(tableId);
            });
        }
    });
    //二级城市联动
    this.select = function (province='province', city='city', selectName='城市', url='/admin/user/CtyList') {
        form.on('select('+province+')', function (data) {
            $('#'+city).html('<option value="">--请选择'+selectName+'--</option>');
            $.post(url, {
                province: data.value
            }, function (res) {
                $.each(res, function (kay, val) {
                    $('#'+city).append($('<option>').val(val.id).text(val.name));
                });
                form.render('select');
            });
        });
    }

    this.tinymceInit = function (tinyID = 'remarks', imageUrl = "/admin/Uploads/uploadImage") {
        var tyindex = tinymceTextarea.render({
            selector: '#' + tinyID,
            language: 'zh_CN',
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
            images_upload_url: imageUrl,
            file_picker_callback: function (callback, value, meta) {
                if (meta.filetype == 'image') {
                    var input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept', '.jpg,.png,.gif,.bmp,.jpeg');
                    input.click();
                    input.onchange = function () {
                        var file = this.files[0];
                        formData = new FormData();
                        formData.append('file', file, file.name);
                        var xhr, formData;
                        xhr = new XMLHttpRequest();
                        xhr.withCredentials = false;
                        xhr.open('POST', imageUrl + "?type=images");
                        xhr.onload = function () {
                            var json;
                            if (xhr.status != 200) {
                                alert('HTTP Error: ' + xhr.status);
                                return;
                            }
                            json = JSON.parse(xhr.responseText);
                            if (!json || typeof json.data.path != 'string') {
                                alert('Invalid JSON: ' + xhr.responseText);
                                return;
                            }
                            callback(json.data.path, {
                                alt: json.data.savename
                            });
                        };
                        formData = new FormData();
                        formData.append('file', file, file.name);
                        xhr.send(formData);
                    }
                } else if (meta.filetype == 'file') {
                    var input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept', '.docx,.doc,.xlsx,.xls,.zip');
                    input.click();
                    input.onchange = function () {
                        var file = this.files[0];
                        var xhr, formData;
                        xhr = new XMLHttpRequest();
                        xhr.withCredentials = false;
                        xhr.open('POST', imageUrl + "?type=file");
                        xhr.onload = function () {
                            var json;
                            if (xhr.status != 200) {
                                alert('HTTP Error: ' + xhr.status);
                                return;
                            }
                            json = JSON.parse(xhr.responseText);
                            if (!json || typeof json.data.path != 'string') {
                                alert('Invalid JSON: ' + xhr.responseText);
                                return;
                            }
                            callback(json.data.path, {
                                text: json.data.savename
                            });
                        };
                        formData = new FormData();
                        formData.append('file', file, file.name);
                        xhr.send(formData);
                    }
                } else if (meta.filetype == 'media') {
                    var input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept', '.mp4,.flv,.avi,.rm,.rmvb');
                    input.click();
                    input.onchange = function () {
                        var file = this.files[0];
                        var xhr, formData;
                        xhr = new XMLHttpRequest();
                        xhr.withCredentials = false;
                        xhr.open('POST', imageUrl + "?type=media");
                        xhr.onload = function () {
                            var json;
                            if (xhr.status != 200) {
                                alert('HTTP Error: ' + xhr.status);
                                return;
                            }
                            json = JSON.parse(xhr.responseText);
                            if (!json || typeof json.data.path != 'string') {
                                alert('Invalid JSON: ' + xhr.responseText);
                                return;
                            }
                            callback(json.data.path, {
                                alt: json.data.savename
                            });
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
            toolbar_drawer: false,
        });
    }
    var obj = {
        table: function (title, url, cols, height = 220, callback, mwidth = 400, isToolBar = true, defaultToolbar = true, isPage = true, skin = 'line', size = '', isTool = true) {
            if (callback == undefined) {
                callback = function () {}
            }
            var search = form.val(elem + 'Id');
            var data = {
                title: title,
                elem: '#' + elem,
                height: 'full-' + height,
                url: url, //数据接口
                where: search,
                method: 'post',
                cellMinWidth: mwidth,
                page: true, //开启分页
                autoSort: true,
                even: true,
                limit: 20,
                cols: cols,
                done: function (res, curr, count) {
                    if (res.count == 0) {
                        $(".layui-table-main").html('<div class="layui-none">暂无数据</div>');
                    }
                    callback(res);
                },
                id: elem + 'Id',
            };
            if (!isPage) {
                data.limits = [500];
                data.limit = 500;
            } else {
                data.limits = [10, 20, 30, 40, 50, 100];
                data.limit = 20;
            }
            if (skin != '') data.skin = skin;
            if (size != '') data.size = size;
            if (size == 'lg') data.limit = 10;
            if (!isTool) data.height = "full-40";
            if (isToolBar) data.toolbar = '#toolbarDemo';
            if (defaultToolbar) data.defaultToolbar = ['filter', {
                title: '导出',
                layEvent: 'export',
                icon: 'layui-icon-export',
            }, {
                title: '加载',
                layEvent: 'reload',
                icon: 'layui-icon-refresh-3',
            }];
            table.render(data);

            var active = {
                //搜索
                search: function () {
                    //执行重载
                    table.reload(elem + 'Id', {
                        page: {
                            curr: 1 //重新从第 1 页开始
                        },
                        where: form.val(elem + 'Id'),
                    });
                    success_msg('查询成功!');
                },
                //全部
                all: function () {
                    var myform = {};
                    $('.layui-form').find('input, select, textarea').each(function () {
                        if (this.name !== '') {
                            myform[this.name] = '';
                        }
                    });
                    //执行重载
                    table.reload(elem + 'Id', {
                        page: {
                            curr: 1 //重新从第 1 页开始
                        },
                        where: form.val(elem + 'Id', myform),
                    });
                },
            };
            //点击搜索
            $('.layui-btn').on('click', function () {
                var type = $(this).data('type');
                active[type] ? active[type].call(this) : '';
            });
        },
        submit: function (tableName, url, tinyID) { //isChange=true,
            form.on('submit(' + tableName + ')', function (data) {
                if (tinyID) {
                    data.field.remarks = tinymceTextarea.getContent(tinyID);
                }
                post(url, data.field, function (res) {}, true);
                return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
            });
        },
        editField: function (tableName, url) {
            table.on('edit(' + tableName + ')', function (obj) {
                var value = obj.value //修改后的值
                    ,
                    data = obj.data //所在行所有键值
                    ,
                    field = obj.field; //字段名称
                post(url, {
                        id: data.id,
                        name: obj.field,
                        value: obj.value,
                    }, function (res) {

                    },
                    true);
                return false;
            });
        },
        switch: function (layFilter, url) {
            form.on('switch(' + layFilter + ')', function (obj) {
                // console.log(obj.elem.name); //得到checkbox原始DOM对象
                // console.log(obj.elem.checked); //开关是否开启，true或者false
                // console.log(obj.value); //开关value值，也可以通过data.elem.value得到
                // return false;
                post(url, {
                    id: obj.value,
                    name: obj.elem.name,
                    value: obj.elem.checked == true ? 1 : 0
                }, function (res) {}, true);
                return false;
            });
        },
        uploadImage: function (params = 'uploadImg', inputId = 'uploadImg2', imgId = 'uploadImg3', url = "{:url('Uploads/uploadImage',['type'=>'images'])}", size = 2048, isProgress = false) {
            var data = {
                elem: '#' + params,
                url: url,
                accept: 'images',
                acceptMime: 'image/*',
                exts: 'jpg|png|gif|bmp|jpeg',
                size: size,
                before: function (obj) {
                    //预读本地文件示例，不支持ie8
                    obj.preview(function (index, file, result) {
                        $('#' + imgId).attr('src', result); //图片链接（base64）
                    });
                },
                done: function (res) {
                    if (res.code == '01') {
                        $('#' + inputId).val(res.data.path);
                        $('#' + imgId).attr('src', res.data.path);
                    } else {
                        return error_msg('上传文件类型为：jpg,png,gif,bmp,jpeg，且大小不能超过8M');
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
            };
            if (isProgress) {
                data.progress = function (n) {
                    $('.layui-progress').show();
                    var percent = n + '%'; //获取进度百分比
                    element.progress('demo', percent); //可配合 layui 进度条元素使用
                }
            }
            var uploadInst = upload.render(data);
        },
        uploadFiles: function (params = 'uploadImg', inputId = 'uploadImg2', imgId = 'uploadImg3', url = "{:url('Uploads/uploadFiles',['type'=>'images'])}", size = 60, isProgress = false) {
            var data = {
                elem: '#' + params,
                url: url,
                accept: 'file',
                exts: 'xls|xlsx',
                size: size,
                done: function (res) {
                    if (res.code == '01') {
                        $('#' + inputId).val(res.data.path);
                        $('#' + imgId).text('上传文件--' + res.data.savename);
                    } else {
                        return error_msg('上传文件类型为：gif,xls,xlsx,doc,docx，且大小不能超过8M', );
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
            };
            if (isProgress) {
                data.progress = function (n) {
                    $('.layui-progress').show();
                    var percent = n + '%'; //获取进度百分比
                    element.progress('demo', percent); //可配合 layui 进度条元素使用
                }
            }
            var uploadInst = upload.render(data);
        },
        uploadVideo: function (params = 'uploadImg', inputId = 'video2', imgId = 'video3', url = "{:url('Uploads/uploadImage')}?type=video", size = 30 * 1024) {
            var data = {
                elem: '#' + params,
                url: url,
                accept: 'video',
                acceptMime: 'video/*',
                exts: 'mp4|flv|avi|rm|rmvb',
                size: size,
                before: function (obj) {
                    //预读本地文件示例，不支持ie8
                    obj.preview(function (index, file, result) {
                        $('#' + imgId).attr('src', result); //图片链接（base64）
                    });
                },
                done: function (res) {
                    if (res.code == '01') {
                        $('#' + inputId).val(res.data.path);
                        $('#' + imgId).attr('src', res.data.path);
                        form.render();
                    } else {
                        return layer.msg('上传文件类型为：mp4,flv,avi,rm,rmvb，且大小不能超过8M', {
                            icon: 2
                        })
                    }
                    //上传成功
                },
                error: function () {
                    //演示失败状态，并实现重传
                    var demoText = $('#uploadVideoText');
                    demoText.html(
                        '<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-mini demo-reload">重试</a>'
                    );
                    demoText.find('.demo-reload').on('click', function () {
                        uploadVideo.upload();
                    });
                },
            }
            upload.render(data);
        },
    };
    //输出接口
    exports('common', obj);


});