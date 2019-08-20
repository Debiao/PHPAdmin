<?php /*a:2:{s:64:"/Users/sundebiao/PHPAdmin/application/wechat/view/keys/form.html";i:1564341490;s:58:"/Users/sundebiao/PHPAdmin/application/admin/view/main.html";i:1564341490;}*/ ?>
<div class="layui-card layui-bg-gray"><style>
    .keys-container .input-group-addon{top:0;right:0;color:#eee;width:25px;padding:7px;position:absolute;margin-top:-1px;text-align:center;background:#393D49}
    .keys-container [data-tips-image]{width:112px;height:auto}
    .keys-container .layui-card{width:580px;height:578px;position:absolute;border:1px solid #ccc}
    .keys-container .layui-card .layui-card-body{height:515px;padding-right:50px}
</style><?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?><div class="layui-card-header layui-anim layui-anim-fadein notselect"><span class="layui-icon layui-icon-next font-s10 color-desc margin-right-5"></span><?php echo htmlentities((isset($title) && ($title !== '')?$title:'')); ?><div class="pull-right"></div></div><?php endif; ?><div class="layui-card-body layui-anim layui-anim-upbit"><div class="nowrap think-box-shadow" style="width:910px"><div class='mobile-preview inline-block'><div class='mobile-header'>公众号</div><div class='mobile-body'><iframe id="phone-preview" frameborder="0" marginheight="0" marginwidth="0"></iframe></div></div><div class="keys-container inline-block absolute margin-left-10 margin-right-15"><form class="layui-form" onsubmit="return false" autocomplete="off" data-auto="true" action="<?php echo request()->url(); ?>" method="post"><div class="layui-card relative"><div class="layui-card-header layui-bg-gray text-center">编辑关键字</div><div class="layui-card-body"><!--<?php if(!isset($vo['keys']) or ($vo['keys'] != 'default' and $vo['keys'] != 'subscribe')): ?>--><div class="layui-form-item margin-top-10"><label class="layui-form-label">关 键 字</label><div class="layui-input-block"><input required placeholder='请输入关键字' maxlength='20' name='keys' class="layui-input" value='<?php echo htmlentities((isset($vo['keys']) && ($vo['keys'] !== '')?$vo['keys']:"")); ?>'></div></div><!--<?php else: ?>--><input type="hidden" name="keys" value="<?php echo htmlentities((isset($vo['keys']) && ($vo['keys'] !== '')?$vo['keys']:'')); ?>"><!--<?php endif; ?>--><div class="layui-form-item"><label class="layui-form-label label-required">规则状态</label><div class="layui-input-block"><?php foreach(['1'=>'启用','0'=>'禁用'] as $k=>$v): ?><label class="think-radio"><!--<?php if((!isset($vo['status']) and $k == '1') or (isset($vo['status']) and $vo['status'] == $k)): ?>--><input type="radio" checked name="status" value="<?php echo htmlentities($k); ?>"><?php echo htmlentities($v); ?><!--<?php else: ?>--><input type="radio" name="status" value="<?php echo htmlentities($k); ?>"><?php echo htmlentities($v); ?><!--<?php endif; ?>--></label><?php endforeach; ?></div></div><div class="layui-form-item"><label class="layui-form-label label-required">消息类型</label><div class="layui-input-block"><?php foreach($msgTypes as $k=>$v): ?><label class="think-radio"><!--<?php if((!isset($vo['type']) and $k == 'text') or (isset($vo['type']) and$vo['type'] == $k)): ?>--><input name="type" checked type="radio" value="<?php echo htmlentities($k); ?>"><?php echo htmlentities($v); ?><!--<?php else: ?>--><input name="type" type="radio" value="<?php echo htmlentities($k); ?>"><?php echo htmlentities($v); ?><!--<?php endif; ?>--></label><?php endforeach; ?></div></div><div class="layui-form-item" data-keys-type='text'><label class="layui-form-label">回复内容</label><div class="layui-input-block"><textarea name="content" maxlength="10000" class="layui-textarea"><?php echo (isset($vo['content']) && ($vo['content'] !== '')?$vo['content']:'说点什么吧'); ?></textarea></div></div><div class="layui-form-item" data-keys-type='news'><label class="layui-form-label label-required">选取图文</label><div class="layui-input-block"><input type="hidden" name="news_id" value="<?php echo htmlentities((isset($vo['news_id']) && ($vo['news_id'] !== '')?$vo['news_id']:0)); ?>"><a class="layui-btn layui-btn-primary" data-title="选择图文" data-iframe="<?php echo url('wechat/news/select'); ?>?field=<?php echo encode('news_id'); ?>">选择图文</a></div></div><div class="layui-form-item" data-keys-type='image'><label class="layui-form-label label-required">图片地址</label><div class="layui-input-block"><input class="layui-input" onchange="$(this).nextAll('img').attr('src', this.value)" value="<?php echo htmlentities((isset($vo['image_url']) && ($vo['image_url'] !== '')?$vo['image_url']:$defaultImage)); ?>" name="image_url" required placeholder="请上传图片或输入图片URL地址"><a data-file="btn" data-type="bmp,png,jpeg,jpg,gif" data-field="image_url" class="input-group-addon"><i class="layui-icon layui-icon-upload"></i></a><p class="help-block">文件最大2Mb，支持bmp/png/jpeg/jpg/gif格式</p><img data-tips-image src='<?php echo htmlentities((isset($vo['image_url']) && ($vo['image_url'] !== '')?$vo['image_url']:$defaultImage)); ?>'></div></div><div class="layui-form-item" data-keys-type='voice'><label class="layui-form-label">上传语音</label><div class="layui-input-block"><div class="input-group"><input class='layui-input' value="<?php echo htmlentities((isset($vo['voice_url']) && ($vo['voice_url'] !== '')?$vo['voice_url']:'')); ?>" name="voice_url" required title="请上传语音文件或输入语音URL地址　　　"><a data-file="btn" data-type="mp3,wma,wav,amr" data-field="voice_url" class="input-group-addon"><i class="layui-icon layui-icon-upload"></i></a></div><p class="help-block">文件最大2Mb，播放长度不超过60s，mp3/wma/wav/amr格式</p></div></div><div class="layui-form-item" data-keys-type='music'><label class="layui-form-label">音乐标题</label><div class="layui-input-block"><input class='layui-input' value="<?php echo htmlentities((isset($vo['music_title']) && ($vo['music_title'] !== '')?$vo['music_title']:'音乐标题')); ?>" name="music_title" required title="请输入音乐标题"></div></div><div class="layui-form-item" data-keys-type='music'><label class="layui-form-label label-required">上传音乐</label><div class="layui-input-block"><div class="input-group"><input class='layui-input' value="<?php echo htmlentities((isset($vo['music_url']) && ($vo['music_url'] !== '')?$vo['music_url']:'')); ?>" name="music_url" required title="请上传音乐文件或输入音乐URL地址　　　"><a data-file="btn" data-type="mp3,wma,wav,amr" data-field="music_url" class="input-group-addon"><i class="layui-icon layui-icon-upload"></i></a></div></div></div><div class="layui-form-item" data-keys-type='music'><label class="layui-form-label">音乐描述</label><div class="layui-input-block"><input name="music_desc" class="layui-input" value="<?php echo (isset($vo['music_desc']) && ($vo['music_desc'] !== '')?$vo['music_desc']:'音乐描述'); ?>"></div></div><div class="layui-form-item" data-keys-type='music'><label class="layui-form-label">音乐图片</label><div class="layui-input-block"><input class="layui-input" value="<?php echo htmlentities((isset($vo['music_image']) && ($vo['music_image'] !== '')?$vo['music_image']:$defaultImage)); ?>" name="music_image" required title="请上传音乐图片或输入音乐图片URL地址　　　"><a data-file="btn" data-type="jpg,png" data-field="music_image" class="input-group-addon"><i class="layui-icon layui-icon-upload"></i></a><p class="help-block">文件最大64KB，只支持JPG格式</p></div></div><div class="layui-form-item" data-keys-type='video'><label class="layui-form-label">视频标题</label><div class="layui-input-block"><input class='layui-input' value="<?php echo htmlentities((isset($vo['video_title']) && ($vo['video_title'] !== '')?$vo['video_title']:'视频标题')); ?>" name="video_title" required placeholder="请输入视频标题"></div></div><div class="layui-form-item" data-keys-type='video'><label class="layui-form-label">上传视频</label><div class="layui-input-block"><div class="input-group"><input class='layui-input' value="<?php echo htmlentities((isset($vo['video_url']) && ($vo['video_url'] !== '')?$vo['video_url']:'')); ?>" name="video_url" required title="请上传视频或输入音乐视频URL地址　　　"><a data-file="btn" data-type="mp4" data-field="video_url" class="input-group-addon"><i class="layui-icon layui-icon-upload"></i></a></div><p class="help-block">文件最大10MB，只支持MP4格式</p></div></div><div class="layui-form-item" data-keys-type='video'><label class="layui-form-label">视频描述</label><div class="layui-input-block"><input value="<?php echo htmlentities((isset($vo['video_desc']) && ($vo['video_desc'] !== '')?$vo['video_desc']:'视频描述')); ?>" name="video_desc" maxlength="50" class="layui-input"></div></div><div class="text-center padding-bottom-10 absolute full-width" style="bottom:0;margin-left:-15px"><div class="hr-line-dashed margin-top-10 margin-bottom-10"></div><button class="layui-btn menu-submit">保存数据</button><!--<?php if(!isset($vo['keys']) || !in_array($vo['keys'],['default','subscribe'])): ?>--><button data-cancel-edit class="layui-btn layui-btn-danger" type='button'>取消编辑</button><!--<?php endif; ?>--><?php if(isset($vo['id'])): ?><input type='hidden' value='<?php echo htmlentities($vo['id']); ?>' name='id'><?php endif; ?></div></div></div></form></div></div></div><script>    $(function () {

        var $body = $('body');

        // 取消编辑返回
        $('[data-cancel-edit]').on('click', function () {
            $.msg.confirm('确定取消编辑吗？', function (index) {
                history.back(), $.msg.close(index);
            });
        });

        // 刷新预览显示
        function showReview(params) {
            var src = '';
            if (params['type'] === 'news') {
                src = '<?php echo url("@wechat/api.review/news/_id_"); ?>'.replace('_id_', params.content);
            } else {
                src = '<?php echo url("@wechat/api.review/_type_"); ?>?'.replace('_type_', params.type) + $.param(params || {});
            }
            $('#phone-preview').attr('src', src);
        }

        // 图文显示预览
        $body.off('change', '[name="news_id"]').on('change', '[name="news_id"]', function () {
            showReview({type: 'news', content: this.value});
        });

        // 文字显示预览
        $body.off('change', '[name="content"]').on('change', '[name="content"]', function () {
            showReview({type: 'text', content: this.value});
        });

        // 图片显示预览
        $body.off('change', '[name="image_url"]').on('change', '[name="image_url"]', function () {
            showReview({type: 'image', content: this.value});
        });

        // 图片显示预览
        $body.off('change', '[name="voice_url"]').on('change', '[name="voice_url"]', function () {
            showReview({type: 'voice', content: this.value});
        });

        // 音乐显示预览
        var musicSelector = '[name="music_url"],[name="music_title"],[name="music_desc"],[name="music_image"]';
        $body.off('change', musicSelector).on('change', musicSelector, function () {
            var params = {type: 'music'}, $parent = $(this).parents('form');
            params.url = $parent.find('[name="music_url"]').val();
            params.desc = $parent.find('[name="music_desc"]').val();
            params.title = $parent.find('[name="music_title"]').val();
            params.image = $parent.find('[name="music_image"]').val();
            showReview(params);
        });

        // 视频显示预览
        var videoSelector = '[name="video_title"],[name="video_url"],[name="video_desc"]';
        $body.off('change', videoSelector).on('change', videoSelector, function () {
            var params = {type: 'video'}, $parent = $(this).parents('form');
            params.url = $parent.find('[name="video_url"]').val();
            params.desc = $parent.find('[name="video_desc"]').val();
            params.title = $parent.find('[name="video_title"]').val();
            showReview(params);
        });

        // 默认类型事件
        $body.off('click', 'input[name=type]').on('click', 'input[name=type]', function () {
            var value = $(this).val(), $form = $(this).parents('form');
            if (value === 'customservice') value = 'text';
            var $current = $form.find('[data-keys-type="' + value + '"]').removeClass('layui-hide');
            $form.find('[data-keys-type]').not($current).addClass('layui-hide');
            switch (value) {
                case 'news':
                    return $('[name="news_id"]').trigger('change');
                case 'text':
                    return $('[name="content"]').trigger('change');
                case 'image':
                    return $('[name="image_url"]').trigger('change');
                case 'video':
                    return $('[name="video_url"]').trigger('change');
                case 'music':
                    return $('[name="music_url"]').trigger('change');
                case 'voice':
                    return $('[name="voice_url"]').trigger('change');
                case 'customservice':
                    return $('[name="content"]').trigger('change');
            }
        });

        // 默认事件触发
        $('input[name=type]:checked').map(function () {
            $(this).trigger('click');
        });

    });
</script></div>