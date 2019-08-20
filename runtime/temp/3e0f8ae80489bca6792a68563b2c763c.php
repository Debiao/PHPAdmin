<?php /*a:2:{s:65:"/Users/sundebiao/PHPAdmin/application/wechat/view/news/index.html";i:1564341490;s:58:"/Users/sundebiao/PHPAdmin/application/admin/view/main.html";i:1564341490;}*/ ?>
<div class="layui-card layui-bg-gray"><style>
    #news-box {
        position: relative
    }

    #news-box .news-item {
        top: 0;
        left: 0;
        padding: 5px;
        margin: 10px;
        width: 300px;
        position: relative;
        border: 1px solid #ccc;
        box-sizing: content-box
    }

    #news-box .news-item .news-articel-item {
        width: 100%;
        height: 150px;
        overflow: hidden;
        position: relative;
        background-size: 100%;
        background-position: center center
    }

    #news-box .news-item .news-articel-item p {
        bottom: 0;
        width: 100%;
        color: #fff;
        padding: 5px;
        max-height: 5em;
        font-size: 12px;
        overflow: hidden;
        position: absolute;
        text-overflow: ellipsis;
        background: rgba(0, 0, 0, .7)
    }

    #news-box .news-item .news-articel-item.other {
        height: 50px;
        padding: 5px 0
    }

    #news-box .news-item .news-articel-item span {
        width: 245px;
        overflow: hidden;
        line-height: 50px;
        white-space: nowrap;
        display: inline-block;
        text-overflow: ellipsis
    }

    #news-box .news-item .news-articel-item div {
        width: 50px;
        height: 50px;
        float: right;
        overflow: hidden;
        position: relative;
        background-size: 100%;
        background-position: center center
    }

    #news-box .hr-line-dashed {
        margin: 6px 0 1px 0
    }

    #news-box .news-item .hr-line-dashed:last-child {
        display: none
    }

    #news-box .news-tools {
        top: 0;
        z-index: 80;
        color: #fff;
        width: 302px;
        padding: 0 5px;
        margin-left: -6px;
        line-height: 38px;
        text-align: right;
        position: absolute;
        background: rgba(0, 0, 0, .7)
    }

    #news-box .news-tools a {
        color: #fff;
        margin-left: 10px
    }
</style><?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?><div class="layui-card-header layui-anim layui-anim-fadein notselect"><span class="layui-icon layui-icon-next font-s10 color-desc margin-right-5"></span><?php echo htmlentities((isset($title) && ($title !== '')?$title:'')); ?><div class="pull-right"><button data-open="<?php echo url('add'); ?>" class='layui-btn layui-btn-sm layui-btn-primary'>添加图文</button></div></div><?php endif; ?><div class="layui-card-body layui-anim layui-anim-upbit"><div class="think-box-shadow"><div id="news-box" class="layui-clear"><?php foreach($list as $vo): ?><div class="news-item"><div class='news-tools layui-hide'><a data-phone-view="<?php echo url('@wechat/api.review/news/'.$vo['id']); ?>" href='javascript:void(0)'>预览</a><a data-open='<?php echo url("edit"); ?>?id=<?php echo htmlentities($vo['id']); ?>' href='javascript:void(0)'>编辑</a><a data-news-del="<?php echo htmlentities($vo['id']); ?>" href='javascript:void(0)'>删除</a></div><?php foreach($vo['articles'] as $k => $v): if($k < 1): ?><div data-tips-image='<?php echo htmlentities($v['local_url']); ?>' class='news-articel-item' style='background-image:url("<?php echo htmlentities($v['local_url']); ?>")'><?php if($v['title']): ?><p><?php echo htmlentities($v['title']); ?></p><?php endif; ?></div><div class="hr-line-dashed"></div><?php else: ?><div class='news-articel-item other'><span><?php echo htmlentities($v['title']); ?></span><div data-tips-image='<?php echo htmlentities($v['local_url']); ?>' style='background-image:url("<?php echo htmlentities($v['local_url']); ?>");'></div></div><div class="hr-line-dashed"></div><?php endif; ?><?php endforeach; ?></div><?php endforeach; ?></div><?php if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): ?><span class="notdata">没有记录哦</span><?php else: ?><?php echo (isset($pagehtml) && ($pagehtml !== '')?$pagehtml:''); ?><?php endif; ?></div></div><script>    $('body').on('mouseenter', '.news-item', function () {
        $(this).find('.news-tools').removeClass('layui-hide');
    }).on('mouseleave', '.news-item', function () {
        $(this).find('.news-tools').addClass('layui-hide');
    });

    require(['jquery.masonry'], function (Masonry) {
        var item = document.querySelector('#news-box');
        var msnry = new Masonry(item, {itemSelector: '.news-item', columnWidth: 0});
        msnry.layout();
        $('body').on('click', '[data-news-del]', function () {
            var that = this;
            var dialogIndex = $.msg.confirm('确定要删除图文吗？', function () {
                $.form.load('<?php echo url("remove"); ?>', {value: 0, field: 'delete', id: that.getAttribute('data-news-del')}, 'post', function (ret) {
                    if (ret.code) {
                        $(that).parents('.news-item').remove();
                        return $.msg.success(ret.msg), msnry.layout(), false;
                    }
                    return $.msg.error(ret.msg), false;
                });
                $.msg.close(dialogIndex);
            });
        });
    });

</script></div>