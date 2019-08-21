<?php /*a:3:{s:64:"/Users/sundebiao/PHPAdmin/application/wechat/view/news/form.html";i:1564341490;s:58:"/Users/sundebiao/PHPAdmin/application/admin/view/main.html";i:1564341490;s:70:"/Users/sundebiao/PHPAdmin/application/wechat/view/news/form-style.html";i:1564341490;}*/ ?>
<div class="layui-card layui-bg-gray"><style>
    .news-left {
        width: 300px;
        float: left;
        margin-right: 15px;
    }

    .news-right {
        overflow: hidden;
        width: 980px;
        position: relative;
        display: inline-block;
    }

    .news-left .news-item {
        height: 150px;
        cursor: pointer;
        max-width: 270px;
        overflow: hidden;
        position: relative;
        border: 1px solid #ccc;
        background-size: cover;
        background-position: center center
    }

    .news-left .news-item.active {
        border: 1px solid #44b549 !important
    }

    .news-left .article-add {
        color: #999;
        display: block;
        font-size: 22px;
        text-align: center
    }

    .news-left .article-add:hover {
        color: #666
    }

    .news-left .news-title {
        bottom: 0;
        color: #fff;
        width: 272px;
        display: block;
        padding: 0 5px;
        max-height: 6em;
        overflow: hidden;
        margin-left: -1px;
        position: absolute;
        text-overflow: ellipsis;
        background: rgba(0, 0, 0, .7)
    }

    .news-left .news-item a {
        color: #fff;
        width: 30px;
        height: 30px;
        float: right;
        font-size: 12px;
        margin-top: -1px;
        line-height: 34px;
        text-align: center;
        margin-right: -1px;
        background-color: rgba(0, 0, 0, .5)
    }

    .news-left .news-item:hover a {
        display: inline-block !important
    }

    .news-left .news-item a:hover {
        text-decoration: none;
        background-color: #0C0C0C
    }

    .news-right .upload-image-box {
        width: 130px;
        height: 90px;
        border: 1px solid rgba(125, 125, 125, .1);
        background: url("/static/plugs/uploader/theme/image.png") no-repeat center center;
        background-size: cover;
    }
</style><?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?><div class="layui-card-header layui-anim layui-anim-fadein notselect"><span class="layui-icon layui-icon-next font-s10 color-desc margin-right-5"></span><?php echo htmlentities((isset($title) && ($title !== '')?$title:'')); ?><div class="pull-right"></div></div><?php endif; ?><div class="layui-card-body layui-anim layui-anim-upbit"><div id="NewsEditor" class="layui-clear nowrap padding-bottom-30"><div class="layui-card news-left"><div class="layui-card-body layui-hide"><div ng-if="list.length > 0" ng-repeat="x in list"><div class="news-item transition" ng-click="setItem($index,$event)" style="{{x.style}}" ng-class="x.active?'active':''"><a ng-click="delItem($index, $event)" class="transition layui-icon layui-hide">&#x1006;</a><a ng-click="dnItem($index, $event)" class="transition layui-icon layui-hide">&#xe61a;</a><a ng-click="upItem($index, $event)" class="transition layui-icon layui-hide">&#xe619;</a><span class="news-title" ng-bind="x.title"></span></div><hr></div><div ng-if="list.length<1" class="news-item transition active"><a ng-click="delItem($index, $event)" class="transition layui-icon layui-hide">&#x1006;</a><a ng-click="dnItem($index, $event)" class="transition layui-icon layui-hide">&#xe61a;</a><a ng-click="upItem($index, $event)" class="transition layui-icon layui-hide">&#xe619;</a><span class="news-title"></span><hr></div><a class='article-add transition' ng-click="addItem()" data-text-tip="添加图文"><i class="fa fa-plus"></i></a></div></div><div class="layui-card news-right"><div class="layui-card-body"><form class="layui-form padding-20" role="form" name="news" onsubmit="return false"><label class="layui-form-item relative block"><span class="color-green">文章标题</span><input maxlength="64" ng-model="item.title" required placeholder="请在这里输入标题" name='title' class="layui-input"></label><label class="layui-form-item relative block"><span class="color-green">文章作者</span><input maxlength="64" ng-model="item.author" required placeholder="请输入文章作者" name='author' class="layui-input"></label><div class="layui-form-item label-required-prev"><span class="color-green">图文封面大图片</span><div class="layui-clear"><div class="upload-image-box pull-left transition" data-tips-image="{{item.local_url}}" style="{{item.style}}"><input ng-model="item.local_url" data-auto-none value="{{item.local_url}}" type="hidden" name="local_url"></div><div class="pull-left padding-top-15 padding-left-15"><button type="button" data-title="上传图片" data-file="btn" data-type="jpg,png,jpeg" data-field="local_url" class="layui-btn layui-btn-sm layui-btn-primary">上传图片</button><br><label class="think-checkbox notselect margin-top-15"><input ng-model="item.show_cover_pic" ng-checked="!!item.show_cover_pic" data-auto-none type="checkbox" value="1" name="show_cover_pic"> 在正文顶部显示此图片
                            </label></div></div><p class="color-desc">封面大图片建议尺寸 900像素 * 500像素</p></div><div class="layui-form-item label-required-prev"><span class="color-green">图文文章内容</span><textarea ng-model="item.content" name='content'></textarea></div><label class="layui-form-item relative block"><span class="help-block">摘要选填，如果不填写会默认抓取正文前54个字</span><textarea ng-model="item.digest" name="digest" class="layui-textarea" style="height:80px;line-height:18px"></textarea></label><label class="layui-form-item relative block"><span class="help-block">原文链接 <span class="color-blue">选填</span>，填写之后在图文左下方会出现此链接</span><input pattern="^(http:\/\/|^https:\/\/|^\/\/)((\w|=|\?|\.|\/|&|-)+)" placeholder="请输入跳转链接地址" ng-model="item.content_source_url" maxlength="200" name='content_source_url' class="layui-input"></label><div class="layui-form-item text-center padding-top-30"><input ng-model="x.read_num" type="hidden"><button ng-click="submit()" type="button" class="layui-btn">保存图文</button></div></form></div></div></div></div><script>
    require(['angular', 'ckeditor'], function () {

        var $form = $('form[name="news"]');
        var $vali = $form.vali().data('validate');
        var editor = window.createEditor('[name="content"]');

        var app = angular.module("NewsEditor", []).run(callback);
        angular.bootstrap(document.getElementById(app.name), [app.name]);

        function callback($rootScope) {
            $rootScope.list = [];
            $rootScope.item = {};

            $.form.load('<?php echo request()->url(); ?>', {output: 'json'}, 'get', function (ret) {
                return $rootScope.$apply(function () {
                    apply((ret.data || {articles: []}).articles || []);
                }), false;
            });

            function apply(list) {
                if (list.length < 1) list.push({
                    title: '新建图文',
                    author: '管理员',
                    content: '文章内容',
                    read_num: 0,
                    local_url: '/static/plugs/uploader/theme/image.png',
                });
                for (var i in list) {
                    list[i].active = false;
                    list[i].style = "background-image:url('" + list[i].local_url + "')";
                }
                $rootScope.list = list;
                $rootScope.item = $rootScope.list[0];
                $rootScope.setItemValue('active', true);
                setTimeout(function () {
                    $vali.checkAllInput();
                    editor.setData($rootScope.item.content);
                    $('.layui-card-body.layui-hide').removeClass('layui-hide');
                }, 100);
            }

            $rootScope.upItem = function (index, $event) {
                $event.stopPropagation();
                var tmp = [], cur = $rootScope.list[index];
                if (index < 1) return false;
                for (var i in $rootScope.list) {
                    (parseInt(i) === parseInt(index) - 1) && tmp.push(cur);
                    (parseInt(i) !== parseInt(index)) && tmp.push($rootScope.list[i]);
                }
                apply(tmp);
            };

            $rootScope.dnItem = function (index, $event) {
                $event.stopPropagation();
                var tmp = [], cur = $rootScope.list[index];
                if (index > $rootScope.list.length - 2) return false;
                for (var i in $rootScope.list) {
                    (parseInt(i) !== parseInt(index)) && tmp.push($rootScope.list[i]);
                    (parseInt(i) === parseInt(index) + 1) && tmp.push(cur);
                }
                apply(tmp);
            };

            $rootScope.delItem = function (index, $event) {
                $event.stopPropagation();
                var list = $rootScope.list, temp = [];
                for (var i in list) (parseInt(i) !== parseInt(index)) && temp.push(list[i]);
                apply(temp);
            };

            $rootScope.setItem = function (index, $event) {
                $event.stopPropagation();
                $vali.checkAllInput();
                if ($form.find('.validate-error').size() > 0) return 0;
                if (editor.getData().length < 1) return $.msg.tips('文章内容不能为空，请输入文章内容！');
                for (var i in $rootScope.list) {
                    if (parseInt(i) !== parseInt(index)) {
                        $rootScope.list[i].active = false;
                    } else {
                        $rootScope.item.content = editor.getData();
                        $rootScope.item = $rootScope.list[i];
                        editor.setData($rootScope.item.content);
                        $rootScope.setItemValue('active', true);
                    }
                }
            };

            $rootScope.setItemValue = function (name, value) {
                $rootScope.item[name] = value;
                $rootScope.item.style = "background-image:url('" + $rootScope.item.local_url + "')";
            };

            $rootScope.addItem = function () {
                if ($rootScope.list.length > 7) return $.msg.tips('最多允许增加7篇文章哦！');
                $rootScope.list.push({
                    title: '新建图文',
                    author: '管理员',
                    content: '文章内容',
                    read_num: 0,
                    local_url: '/static/plugs/uploader/theme/image.png',
                    style: "background-image:url('/static/plugs/uploader/theme/image.png')"
                });
            };

            $rootScope.submit = function () {
                $vali.checkAllInput();
                if ($form.find('.validate-error').size() > 0) {
                    return $.msg.tips('表单验证不成功，请输入需要的内容！');
                }
                $rootScope.item.content = editor.getData();
                var data = [];
                for (var i in $rootScope.list) data.push({
                    id: $rootScope.list[i].id,
                    title: $rootScope.list[i].title,
                    author: $rootScope.list[i].author,
                    digest: $rootScope.list[i].digest,
                    content: $rootScope.list[i].content,
                    read_num: $rootScope.list[i].read_num,
                    local_url: $rootScope.list[i].local_url,
                    show_cover_pic: $rootScope.list[i].show_cover_pic ? 1 : 0,
                    content_source_url: $rootScope.list[i].content_source_url,
                });
                $.form.load('<?php echo request()->url(); ?>', {data: data}, "post");
            };

            $('[name="local_url"]').on('change', function () {
                var value = this.value;
                $rootScope.$apply(function () {
                    $rootScope.setItemValue('local_url', value);
                });
            });
        }
    });
</script></div>