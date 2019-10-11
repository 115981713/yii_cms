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
