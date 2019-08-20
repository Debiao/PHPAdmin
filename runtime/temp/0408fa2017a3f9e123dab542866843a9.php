<?php /*a:3:{s:70:"/Users/sundebiao/PHPAdmin/application/store/view/goods_cate/index.html";i:1564341490;s:58:"/Users/sundebiao/PHPAdmin/application/admin/view/main.html";i:1564341490;s:77:"/Users/sundebiao/PHPAdmin/application/store/view/goods_cate/index_search.html";i:1564341490;}*/ ?>
<div class="layui-card layui-bg-gray"><?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?><div class="layui-card-header layui-anim layui-anim-fadein notselect"><span class="layui-icon layui-icon-next font-s10 color-desc margin-right-5"></span><?php echo htmlentities((isset($title) && ($title !== '')?$title:'')); ?><div class="pull-right"><?php if(auth("store/goods_cate/add")): ?><button data-modal='<?php echo url("add"); ?>' data-title="添加商品分类" class='layui-btn layui-btn-sm layui-btn-primary'>添加商品分类</button><?php endif; if(auth("store/goods_cate/remove")): ?><button data-action='<?php echo url("remove"); ?>' data-rule="id#{key}" class='layui-btn layui-btn-sm layui-btn-primary'>删除商品分类</button><?php endif; ?></div></div><?php endif; ?><div class="layui-card-body layui-anim layui-anim-upbit"><div class="think-box-shadow"><fieldset><legend>条件搜索</legend><form class="layui-form layui-form-pane form-search" action="<?php echo request()->url(); ?>" onsubmit="return false" method="get" autocomplete="off"><div class="layui-form-item layui-inline"><label class="layui-form-label">分类名称</label><div class="layui-input-inline"><input name="title" value="<?php echo htmlentities((app('request')->get('title') ?: '')); ?>" placeholder="请输入分类名称" class="layui-input"></div></div><div class="layui-form-item layui-inline"><label class="layui-form-label">使用状态</label><div class="layui-input-inline"><select class="layui-select" name="status"><?php foreach([''=>'- 全部状态 -','1'=>'使用中的商品分类','0'=>'已禁用的商品分类'] as $k=>$v): ?><!--<?php if(app('request')->get('status') == $k.""): ?>--><option selected value="<?php echo htmlentities($k); ?>"><?php echo htmlentities($v); ?></option><!--<?php else: ?>--><option value="<?php echo htmlentities($k); ?>"><?php echo htmlentities($v); ?></option><!--<?php endif; ?>--><?php endforeach; ?></select></div></div><div class="layui-form-item layui-inline"><button class="layui-btn layui-btn-primary"><i class="layui-icon">&#xe615;</i> 搜 索</button></div></form><script>form.render()</script></fieldset><table class="layui-table margin-top-10" lay-skin="line"><?php if(!(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty()))): ?><thead><tr><th class='list-table-check-td think-checkbox'><input data-auto-none data-check-target='.list-check-box' type='checkbox'></th><th class='list-table-sort-td'><button type="button" data-reload class="layui-btn layui-btn-xs">刷 新</button></th><th class='text-left nowrap'>分类名称</th><th class="text-center">状态</th><th class="text-center"></th><th></th></tr></thead><?php endif; ?><tbody><?php foreach($list as $key=>$vo): ?><tr><td class='list-table-check-td think-checkbox'><input class="list-check-box" value='<?php echo htmlentities($vo['id']); ?>' type='checkbox'></td><td class='list-table-sort-td'><input data-action-blur="<?php echo request()->url(); ?>" data-value="id#<?php echo htmlentities($vo['id']); ?>;action#sort;sort#{value}" data-loading="false" value="<?php echo htmlentities($vo['sort']); ?>" class="list-sort-input"></td><td class='text-left nowrap'><a data-tips-image="<?php echo htmlentities((isset($vo['logo']) && ($vo['logo'] !== '')?$vo['logo']:'')); ?>" class="fa fa-image font-s14 margin-right-5"></a><?php echo htmlentities((isset($vo['title']) && ($vo['title'] !== '')?$vo['title']:'')); ?></td><td class='text-center nowrap'><?php if($vo['status'] == '0'): ?><span class="layui-badge">已禁用</span><?php else: ?><span class="layui-badge layui-bg-green">使用中</span><?php endif; ?><br></td><td class='text-center nowrap'><?php echo htmlentities(format_datetime($vo['create_at'])); ?></td><td class='text-left nowrap'><?php if(auth("store/goods_cate/edit")): ?><a data-title="编辑商品分类" class="layui-btn layui-btn-sm" data-modal='<?php echo url("edit"); ?>?id=<?php echo htmlentities($vo['id']); ?>'>编 辑</a><?php endif; if($vo['status'] == 1 and auth("store/goods_cate/forbid")): ?><a class="layui-btn layui-btn-sm layui-btn-warm" data-action="<?php echo url('forbid'); ?>" data-value="id#<?php echo htmlentities($vo['id']); ?>;status#0">禁 用</a><?php elseif(auth("store/goods_cate/resume")): ?><a class="layui-btn layui-btn-sm layui-btn-warm" data-action="<?php echo url('resume'); ?>" data-value="id#<?php echo htmlentities($vo['id']); ?>;status#1">启 用</a><?php endif; if(auth("store/goods_cate/remove")): ?><a class="layui-btn layui-btn-sm layui-btn-danger" data-confirm="确定要删除数据吗?" data-action="<?php echo url('remove'); ?>" data-value="id#<?php echo htmlentities($vo['id']); ?>">删 除</a><?php endif; ?></td></tr><?php endforeach; ?></tbody></table><?php if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): ?><span class="notdata">没有记录哦</span><?php else: ?><?php echo (isset($pagehtml) && ($pagehtml !== '')?$pagehtml:''); ?><?php endif; ?></div></div></div>