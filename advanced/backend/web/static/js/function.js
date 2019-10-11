// 注释
    // 200 :成功
    // 400 :失败
    // 401 :其他
// 注释

// 圖片預覽
    function changepic(obj,data,src) {
        //console.log(obj.files[0]);//这里可以获取上传文件的name
        if (src) {
            var newsrc = src;
        } else {
            var newsrc=getObjectURL(obj.files[0]);
        }
        var node = '<div>';
            node += '<img src="'+newsrc+'" id="'+data+'" class="preview-img">';
        node += '</div>';
        $(obj).parent().find('#'+data).remove();
        $(obj).parent().append(node);
    }
    //建立一個可存取到該file的url
    function getObjectURL(file) {
        var url = null ;
        // 下面函数执行的效果是一样的，只是需要针对不同的浏览器执行不同的 js 函数而已
        if (window.createObjectURL!=undefined) { // basic
            url = window.createObjectURL(file) ;
        } else if (window.URL!=undefined) { // mozilla(firefox)
            url = window.URL.createObjectURL(file) ;
        } else if (window.webkitURL!=undefined) { // webkit or chrome
            url = window.webkitURL.createObjectURL(file) ;
        }
        return url ;
    }
    // 点击上传图片
    $('.upload_img').change(function(){
        var data = $(this).attr('data');
        changepic(this,data,'');
    });

    $(function(){
        // 编辑展示图片
        var upload_imgs_len = $('.upload-imgs').length;
        if (upload_imgs_len) {
            var upload_imgs_obj = $('.upload-imgs');
            upload_imgs_obj.each(function(index,obj){
                var src = $(this)[0].defaultValue;
                var data = $(this)[0].attributes.data.value;
                if (src) {
                    changepic(this,data,src);
                }
            });
        }
    });
// 圖片預覽

// 添加遮幕
    // 展示
    function show_disabled_click(){
        var node = '<div class="disabled-click"></div>';
        $('body').append(node);
    }
    // 隐藏
    function hide_disabled_click(){
        $('.disabled-click').remove();
    }
// 添加遮幕

// 弹窗
    // 等待图标 弹窗
    function layer_loading(){
        var index = layer.load(2, {shade: false}); //0代表加载的风格，支持0-2
        return index;
    }
    // 提示弹窗
    function layer_msg(title,icon){
        layer.msg(title,{icon:icon,time:2000});
    }

    // 图片详情弹窗
    function layer_image(img,title){
        var image = '<img src="'+img+'" style="width:100%;height:100%;">';
        layer.open({
          type: 1,
          title:title,
          skin: 'layui-layer-demo',
          closeBtn: 0, 
          anim: 2,
          shadeClose: true,
          content: image
        });
    }
    // 内容详情弹窗
    function layer_content(content,title){
        var div = '<div style="padding:10px;">'+content+'</div>';
        layer.open({
          type: 1,
          title:title,
          skin: 'layui-layer-demo',
          closeBtn: 0, 
          area : ['600px','400px'],
          anim: 2,
          shadeClose: true,
          content: div
        });
    }
// 弹窗

// 操作
    // 删除确认
    $(document).on('click','.delete',function(){
        var that = $(this);
        var id = that.attr('data');//id
        var title = that.attr('data-title');//名称
        var data_v = that.attr('data-v');//是否是视图页面
        var controller = that.attr('data-c');//控制器名称
        if (!title) {
            title = '记录';
        }
        var btn = '确定删除该'+title+'吗?';
        var index_confirm = layer.confirm(btn, {
            btn: ['是','否'], //按钮
            title:'信息确认',
        }, function(index){
            show_disabled_click();
            layer_loading();
            var url = '/'+controller+'/delete';
                $.ajax({
                    url:url,
                    data:{id:id},
                    type:'POST',
                    dataType:'json',
                    timeout:10000,
                    success:function(data){
                        var status = data.status;
                        var msg = data.msg;
                        hide_disabled_click();
                        if (status == 200) {
                            that.parent().parent().parent().remove();
                            layer_msg(msg,1);
                        } else {
                            layer_msg(msg,2);
                        }
                        if (data_v) {
                            setTimeout(function(){
                                window.location.href = '/'+controller+'/index';
                            },1000);
                        }
                    },
                    error:function(){
                        hide_disabled_click();
                        layer_msg('請求失敗，請重試！',2);
                    }
                });
            
            layer.closeAll();
        },function(){
            layer_msg('链接超时',0);
        });
    });
    // 删除确认

    // 查看图片
    $(document).on('click','.look_image',function(){
       var path = $(this).attr('data'); 
       var title = $(this).attr('data-title') ? $(this).attr('data-title') : '查看图片';
       layer_image(path,title);
    });
    // 查看图片    

    // 查看内容
    $(document).on('click','.look_content',function(){
       var content = $(this).attr('data'); 
       var title = $(this).attr('data-title') ? $(this).attr('data-title') : '查看内容';
       layer_content(content,title);
    });
    // 查看内容
// 操作
