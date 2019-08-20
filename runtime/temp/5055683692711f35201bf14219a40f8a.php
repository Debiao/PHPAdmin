<?php /*a:3:{s:72:"/Users/mac/Desktop/ThinkAdmin-5/application/store/view/member/index.html";i:1564341490;s:64:"/Users/mac/Desktop/ThinkAdmin-5/application/admin/view/main.html";i:1564341490;s:79:"/Users/mac/Desktop/ThinkAdmin-5/application/store/view/member/index_search.html";i:1564341490;}*/ ?>
<div class="layui-card layui-bg-gray"><?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?><div class="layui-card-header layui-anim layui-anim-fadein notselect"><span class="layui-icon layui-icon-next font-s10 color-desc margin-right-5"></span><?php echo htmlentities((isset($title) && ($title !== '')?$title:'')); ?><div class="pull-right"></div></div><?php endif; ?><div class="layui-card-body layui-anim layui-anim-upbit"><div class="think-box-shadow"><fieldset><legend>条件搜索</legend><form class="layui-form layui-form-pane form-search" action="<?php echo request()->url(); ?>" onsubmit="return false" method="get" autocomplete="off"><div class="layui-form-item layui-inline"><label class="layui-form-label">会员昵称</label><div class="layui-input-inline"><input name="nickname" value="<?php echo htmlentities((app('request')->get('nickname') ?: '')); ?>" placeholder="请输入微信昵称" class="layui-input"></div></div><div class="layui-form-item layui-inline"><label class="layui-form-label">会员手机</label><div class="layui-input-inline"><input name="phone" value="<?php echo htmlentities((app('request')->get('phone') ?: '')); ?>" placeholder="请输入会员手机" class="layui-input"></div></div><div class="layui-form-item layui-inline"><label class="layui-form-label">会员级别</label><div class="layui-input-inline"><select class="layui-select" name="vip_level"><?php foreach([''=>'- 全部会员 -','0'=>'游客会员','1'=>'临时会员','2'=>'VIP1会员','3'=>'VIP2会员'] as $k=>$v): ?><!--<?php if(app('request')->get('vip_level') == $k.""): ?>--><option selected value="<?php echo htmlentities($k); ?>"><?php echo htmlentities($v); ?></option><!--<?php else: ?>--><option value="<?php echo htmlentities($k); ?>"><?php echo htmlentities($v); ?></option><!--<?php endif; ?>--><?php endforeach; ?></select></div></div><div class="layui-form-item layui-inline"><label class="layui-form-label">注册时间</label><div class="layui-input-inline"><input name="create_at" value="<?php echo htmlentities((app('request')->get('create_at') ?: '')); ?>" placeholder="请选择发送时间" class="layui-input"></div></div><div class="layui-form-item layui-inline"><button class="layui-btn layui-btn-primary"><i class="layui-icon">&#xe615;</i> 搜 索</button><button type="button" data-export-list class="layui-btn layui-btn-primary layui-hide"><i class="layui-icon layui-icon-export"></i> 导 出</button></div></form><script>
        form.render();
        laydate.render({range: true, elem: '[name="create_at"]'})
    </script></fieldset><table class="layui-table margin-top-10" lay-skin="line"><?php if(!(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty()))): ?><thead><tr><th class='list-table-check-td think-checkbox'><input data-auto-none data-check-target='.list-check-box' type='checkbox'></th><th class='text-left nowrap'>会员昵称</th><th class='text-left nowrap'>会员手机</th><th class='text-left nowrap'>会员级别</th><th class='text-left nowrap'>注册时间</th></tr></thead><?php endif; ?><tbody><?php foreach($list as $key=>$vo): ?><tr><td class='list-table-check-td think-checkbox'><label><input class="list-check-box" value='<?php echo htmlentities($vo['id']); ?>' type='checkbox'></label></td><td class='text-left nowrap'><?php if(!(empty($vo['headimg']) || (($vo['headimg'] instanceof \think\Collection || $vo['headimg'] instanceof \think\Paginator ) && $vo['headimg']->isEmpty()))): ?><img data-tips-image style="width:20px;height:20px;vertical-align:top" src="<?php echo htmlentities((isset($vo['headimg']) && ($vo['headimg'] !== '')?$vo['headimg']:'')); ?>" class="margin-right-5"><?php endif; ?><div class="inline-block"><?php echo htmlentities((isset($vo['nickname']) && ($vo['nickname'] !== '')?$vo['nickname']:'--')); ?></div></td><td class='text-left'><?php echo htmlentities((isset($vo['phone']) && ($vo['phone'] !== '')?$vo['phone']:'--')); ?></td><td class='text-left'><?php if($vo['vip_level'] == 0): ?> 游客会员
                <?php elseif($vo['vip_level'] == 1): ?> 临时会员（<?php echo htmlentities((isset($vo['vip_date']) && ($vo['vip_date'] !== '')?$vo['vip_date']:'')); ?>）
                <?php elseif($vo['vip_level'] == 2): ?> VIP1会员（<?php echo htmlentities((isset($vo['vip_date']) && ($vo['vip_date'] !== '')?$vo['vip_date']:'')); ?>）
                <?php elseif($vo['vip_level'] == 3): ?> VIP2会员（<?php echo htmlentities((isset($vo['vip_date']) && ($vo['vip_date'] !== '')?$vo['vip_date']:'')); ?>）
                <?php endif; ?></td><td class='text-left'><?php echo htmlentities(format_datetime($vo['create_at'])); ?></td></tr><?php endforeach; ?></tbody></table><?php if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): ?><span class="notdata">没有记录哦</span><?php else: ?><?php echo (isset($pagehtml) && ($pagehtml !== '')?$pagehtml:''); ?><?php endif; ?></div></div></div>