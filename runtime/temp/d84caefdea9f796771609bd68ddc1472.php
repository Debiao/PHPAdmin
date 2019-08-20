<?php /*a:3:{s:65:"/Users/sundebiao/PHPAdmin/application/wechat/view/keys/index.html";i:1564341490;s:58:"/Users/sundebiao/PHPAdmin/application/admin/view/main.html";i:1564341490;s:72:"/Users/sundebiao/PHPAdmin/application/wechat/view/keys/index_search.html";i:1564341490;}*/ ?>
<div class="layui-card layui-bg-gray"><?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?><div class="layui-card-header layui-anim layui-anim-fadein notselect"><span class="layui-icon layui-icon-next font-s10 color-desc margin-right-5"></span><?php echo htmlentities((isset($title) && ($title !== '')?$title:'')); ?><div class="pull-right"><?php if(auth("wechat/keys/add")): ?><button data-open="<?php echo url('add'); ?>" class='layui-btn layui-btn-sm layui-btn-primary'>添加规则</button><?php endif; if(auth("wechat/keys/remove")): ?><button data-action='<?php echo url("remove"); ?>' data-rule="id#{key}" data-csrf="<?php echo systoken('wechat/keys/remove'); ?>" data-confirm="确定要删除这些规则吗？" class='layui-btn layui-btn-sm layui-btn-primary'>删除规则</button><?php endif; ?></div></div><?php endif; ?><div class="layui-card-body layui-anim layui-anim-upbit"><div class="think-box-shadow"><!-- 表单搜索 开始 --><fieldset><legend>条件搜索</legend><form class="layui-form layui-form-pane form-search" action="<?php echo request()->url(); ?>" onsubmit="return false" method="get" autocomplete="off"><div class="layui-form-item layui-inline"><label class="layui-form-label">匹配规则</label><div class="layui-input-inline"><input name="keys" value="<?php echo htmlentities((app('request')->get('keys') ?: '')); ?>" placeholder="请输入匹配规则" class="layui-input"></div></div><div class="layui-form-item layui-inline"><label class="layui-form-label">规则类型</label><div class="layui-input-inline"><select class="layui-select" name="type"><option value="">-- 全部 --</option><?php foreach($types as $k=>$v): if(app('request')->get('type') == $k.""): ?><option selected value="<?php echo htmlentities($k); ?>"><?php echo htmlentities($v); ?></option><?php else: ?><option value="<?php echo htmlentities($k); ?>"><?php echo htmlentities($v); ?></option><?php endif; ?><?php endforeach; ?></select></div></div><div class="layui-form-item layui-inline"><label class="layui-form-label">使用状态</label><div class="layui-input-inline"><select class="layui-select" name="status"><?php foreach([''=>'-- 全部 --','0'=>'显示使用的规则','1'=>'显示禁止的规则'] as $k=>$v): if(app('request')->get('status') == $k.""): ?><option selected value="<?php echo htmlentities($k); ?>"><?php echo htmlentities($v); ?></option><?php else: ?><option value="<?php echo htmlentities($k); ?>"><?php echo htmlentities($v); ?></option><?php endif; ?><?php endforeach; ?></select></div></div><div class="layui-form-item layui-inline"><label class="layui-form-label">创建时间</label><div class="layui-input-inline"><input name="create_at" value="<?php echo htmlentities((app('request')->get('create_at') ?: '')); ?>" placeholder="请选择创建时间" class="layui-input"></div></div><div class="layui-form-item layui-inline"><button class="layui-btn layui-btn-primary"><i class="layui-icon">&#xe615;</i> 搜 索</button></div></form></fieldset><script>
    window.form.render();
    window.laydate.render({range: true, elem: '[name="create_at"]'});
</script><!-- 表单搜索 结束 --><table class="layui-table margin-top-10" lay-skin="line"><?php if(!(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty()))): ?><thead><tr><th class='list-table-check-td think-checkbox'><input data-auto-none data-check-target='.list-check-box' type='checkbox'/></th><th class='list-table-sort-td'><button type="button" data-reload class="layui-btn layui-btn-xs">刷 新</button></th><th class="text-left nowrap">关键字</th><th class="text-left nowrap">类型</th><th class="text-left nowrap">预览</th><th class="text-left nowrap">添加时间</th><th class="text-left nowrap">状态</th><th></th></tr></thead><?php endif; ?><tbody><?php foreach($list as $key=>$vo): ?><tr><td class='list-table-check-td think-checkbox'><input class="list-check-box" value='<?php echo htmlentities($vo['id']); ?>' type='checkbox'/></td><td class='list-table-sort-td'><input data-action-blur="<?php echo request()->url(); ?>" data-value="id#<?php echo htmlentities($vo['id']); ?>;action#sort;sort#{value}" data-loading="false" value="<?php echo htmlentities($vo['sort']); ?>" class="list-sort-input"></td><td class="text-left nowrap"><?php if(!(empty($vo['qrc']) || (($vo['qrc'] instanceof \think\Collection || $vo['qrc'] instanceof \think\Paginator ) && $vo['qrc']->isEmpty()))): ?><i class="fa fa-qrcode fa-lg pointer margin-right-5" data-load="<?php echo htmlentities($vo['qrc']); ?>" data-time="false" data-tips-text="生成关键字二维码"></i><?php endif; ?><?php echo htmlentities($vo['keys']); ?></td><td class="text-left nowrap"><?php echo htmlentities($vo['type']); ?></td><td class="text-left nowrap"><?php if($vo['type'] == '音乐'): ?><a data-phone-view='<?php echo url("@wechat/api.review/music"); ?>?title=<?php echo htmlentities(urlencode($vo['music_title'])); ?>&desc=<?php echo htmlentities(urlencode($vo['music_desc'])); ?>'>预览 <i class="fa fa-eye"></i></a><?php elseif(in_array($vo['type'],['文字','转客服'])): ?><a data-phone-view='<?php echo url("@wechat/api.review/text"); ?>?content=<?php echo htmlentities(urlencode($vo['content'])); ?>'>预览 <i class="fa fa-eye"></i></a><?php elseif($vo['type'] == '图片'): ?><a data-phone-view='<?php echo url("@wechat/api.review/image"); ?>?content=<?php echo htmlentities(urlencode($vo['image_url'])); ?>'>预览 <i class="fa fa-eye"></i></a><?php elseif($vo['type'] == '图文'): ?><a data-phone-view='<?php echo url("@wechat/api.review/news/".$vo['news_id']); ?>'>预览 <i class="fa fa-eye"></i></a><?php elseif($vo['type'] == '视频'): ?><a data-phone-view='<?php echo url("@wechat/api.review/video"); ?>?title=<?php echo htmlentities(urlencode($vo['video_title'])); ?>&desc=<?php echo htmlentities(urlencode($vo['video_desc'])); ?>&url=<?php echo htmlentities(urlencode($vo['video_url'])); ?>'>预览 <i class="fa fa-eye"></i></a><?php elseif($vo['type'] == '语音'): ?><a data-phone-view='<?php echo url("@wechat/api.review/voice"); ?>?content=<?php echo htmlentities(urlencode($vo['voice_url'])); ?>'>预览 <i class="fa fa-eye"></i></a><?php else: ?><?php echo htmlentities($vo['content']); ?><?php endif; ?></td><td class="text-left nowrap"><?php echo htmlentities(format_datetime($vo['create_at'])); ?></td><td class='text-left nowrap'><?php if($vo['status'] == 0): ?><span class="color-desc">已禁用</span><?php elseif($vo['status'] == 1): ?><span class="color-green">使用中</span><?php endif; ?></td><td class='text-left nowrap'><?php if(auth("wechat/keys/edit")): ?><a class="layui-btn layui-btn-sm" data-open='<?php echo url("edit"); ?>?id=<?php echo htmlentities($vo['id']); ?>'>编 辑</a><?php endif; if($vo['status'] == 1 and auth("wechat/keys/forbid")): ?><a class="layui-btn layui-btn-sm layui-btn-warm" data-action="<?php echo url('forbid'); ?>" data-value="id#<?php echo htmlentities($vo['id']); ?>;status#0" data-csrf="<?php echo systoken('wechat/keys/forbid'); ?>">禁 用</a><?php elseif(auth("wechat/keys/resume")): ?><a class="layui-btn layui-btn-sm layui-btn-warm" data-action="<?php echo url('resume'); ?>" data-value="id#<?php echo htmlentities($vo['id']); ?>;status#1" data-csrf="<?php echo systoken('wechat/keys/resume'); ?>">启 用</a><?php endif; if(auth("wechat/keys/remove")): ?><a class="layui-btn layui-btn-sm layui-btn-danger" data-confirm="确定要删除该规则吗？" data-action="<?php echo url('remove'); ?>" data-value="id#<?php echo htmlentities($vo['id']); ?>" data-csrf="<?php echo systoken('wechat/keys/remove'); ?>">删 除</a><?php endif; ?></td></tr><?php endforeach; ?></tbody></table><?php if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): ?><span class="notdata">没有记录哦</span><?php else: ?><?php echo (isset($pagehtml) && ($pagehtml !== '')?$pagehtml:''); ?><?php endif; ?></div></div><script>    $(function () {
        /**
         * 默认类型事件
         * @type String
         */
        $('body').off('change', 'select[name=type]').on('change', 'select[name=type]', function () {
            var value = $(this).val(), $form = $(this).parents('form');
            var $current = $form.find('[data-keys-type="' + value + '"]').removeClass('hide');
            $form.find('[data-keys-type]').not($current).addClass('hide');
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
            }
        });

        function showReview(params) {
            params = params || {};
            $('#phone-preview').attr('src', '{"@wechat/review"|app_url}&' + $.param(params));
        }

        // 图文显示预览
        $('body').off('change', '[name="news_id"]').on('change', '[name="news_id"]', function () {
            showReview({type: 'news', content: this.value});
        });
        // 文字显示预览
        $('body').off('change', '[name="content"]').on('change', '[name="content"]', function () {
            showReview({type: 'text', content: this.value});
        });
        // 图片显示预览
        $('body').off('change', '[name="image_url"]').on('change', '[name="image_url"]', function () {
            showReview({type: 'image', content: this.value});
        });
        // 音乐显示预览
        var musicSelector = '[name="music_url"],[name="music_title"],[name="music_desc"],[name="music_image"]';
        $('body').off('change', musicSelector).on('change', musicSelector, function () {
            var params = {type: 'music'}, $parent = $(this).parents('form');
            params.title = $parent.find('[name="music_title"]').val();
            params.url = $parent.find('[name="music_url"]').val();
            params.image = $parent.find('[name="music_image"]').val();
            params.desc = $parent.find('[name="music_desc"]').val();
            showReview(params);
        });
        // 视频显示预览
        var videoSelector = '[name="video_title"],[name="video_url"],[name="video_desc"]';
        $('body').off('change', videoSelector).on('change', videoSelector, function () {
            var params = {type: 'video'}, $parent = $(this).parents('form');
            params.title = $parent.find('[name="video_title"]').val();
            params.url = $parent.find('[name="video_url"]').val();
            params.desc = $parent.find('[name="video_desc"]').val();
            showReview(params);
        });

        // 默认事件触发
        $('select[name=type]').map(function () {
            $(this).trigger('change');
        });

        /*! 删除关键字 */
        $('[data-delete]').on('click', function () {
            var id = this.getAttribute('data-delete');
            var url = this.getAttribute('data-action');
            var dialogIndex = $.msg.confirm('确定要删除这条记录吗？', function () {
                $.form.load(url, {id: id}, 'post', function (ret) {
                    if (ret.code === "SUCCESS") {
                        window.location.reload();
                    }
                    $.msg.close(dialogIndex);
                });
            })
        });
    });
</script></div>