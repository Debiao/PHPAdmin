<?php /*a:2:{s:69:"/Users/sundebiao/PHPAdmin/application/wechat/view/config/payment.html";i:1564341490;s:58:"/Users/sundebiao/PHPAdmin/application/admin/view/main.html";i:1564341490;}*/ ?>
<div class="layui-card layui-bg-gray"><?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?><div class="layui-card-header layui-anim layui-anim-fadein notselect"><span class="layui-icon layui-icon-next font-s10 color-desc margin-right-5"></span><?php echo htmlentities((isset($title) && ($title !== '')?$title:'')); ?><div class="pull-right"></div></div><?php endif; ?><div class="layui-card-body layui-anim layui-anim-upbit"><form onsubmit="return false;" data-auto="true" method="post" class='layui-form layui-card ' autocomplete="off" lay-filter="payment"><div class="layui-card-body think-box-shadow"><div class="padding-left-40 padding-right-30"><label class="layui-form-item margin-top-20 block relative"><span class="color-green margin-right-10">微信商户ID</span><span class="nowrap color-desc">MCH_ID</span><input name="wechat_mch_id" required placeholder="请输入微信商户ID（必填）" value="<?php echo sysconf('wechat_mch_id'); ?>" class="layui-input"><p class="help-block">微信商户ID，需要在微信商户平台获取，MCH_ID 与 APPID 匹配</p></label><label class="layui-form-item margin-top-20 block relative"><span class="color-green margin-right-10">微信商户KEY</span><span class="nowrap color-desc">MCH_KEY</span><input name="wechat_mch_key" placeholder="请输入微信商户密钥（必填）" maxlength="32" required value="<?php echo sysconf('wechat_mch_key'); ?>" class="layui-input"><p class="help-block">微信商户密钥，需要在微信商户平台操作设置密码并获取密钥</p></label></div><div class="hr-line-dashed"></div><div class="padding-left-40 padding-right-30"><span class="color-green margin-right-10">微信商户证书</span><span class="nowrap color-desc">MCH_CERT</span><div class=""><?php foreach(['p12'=>'上传 P12 证书','pem'=>'上传 PEM 证书'] as $k=>$v): ?><input type="radio" data-pem-type="<?php echo htmlentities($k); ?>" name="wechat_mch_ssl_type" value="<?php echo htmlentities($k); ?>" title="<?php echo htmlentities($v); ?>" lay-filter="data-mch-type"><?php endforeach; ?><p class="help-block">请选择需要上传证书类型，P12 和 PEM 二选一，证书需要从微信商户平台获取</p><div data-mch-type="p12" class="layui-tab-item padding-top-15 padding-bottom-15"><input name="wechat_mch_ssl_p12" value="<?php echo htmlentities((isset($wechat_mch_ssl_p12) && ($wechat_mch_ssl_p12 !== '')?$wechat_mch_ssl_p12:'')); ?>" type="hidden"><button data-file="btn" data-uptype="local" data-safe="true" data-type="p12" data-field="wechat_mch_ssl_p12" type="button" class="layui-btn layui-btn-primary"><i class="layui-icon layui-icon-vercode font-s14"></i> 上传 P12 证书
                    </button><p class="help-block margin-top-10">微信商户支付 P12 证书，实现订单退款、打款、发红包等支出功能都使用证书</p></div><div data-mch-type="pem" class="layui-tab-item padding-top-15 padding-bottom-15"><input name="wechat_mch_ssl_key" value="<?php echo htmlentities((isset($wechat_mch_ssl_key) && ($wechat_mch_ssl_key !== '')?$wechat_mch_ssl_key:'')); ?>" type="hidden"><button data-file="btn" data-uptype="local" data-safe="true" data-type="pem" data-field="wechat_mch_ssl_key" type="button" class="layui-btn layui-btn-primary margin-right-5"><i class="layui-icon layui-icon-vercode font-s14"></i> 上传 KEY 证书
                    </button><input name="wechat_mch_ssl_cer" value="<?php echo htmlentities((isset($wechat_mch_ssl_cer) && ($wechat_mch_ssl_cer !== '')?$wechat_mch_ssl_cer:'')); ?>" type="hidden"><button data-file="btn" data-uptype="local" data-safe="true" data-type="pem" data-field="wechat_mch_ssl_cer" type="button" class="layui-btn layui-btn-primary"><i class="layui-icon layui-icon-vercode font-s14"></i> 上传CERT证书
                    </button><p class="help-block margin-top-10">微信商户支付 PEM 双向证书，实现订单退款、打款、发红包等支出功能都使用证书</p></div></div></div><div class="hr-line-dashed"></div><div class="layui-form-item text-center"><button class="layui-btn" type="submit">保存配置</button></div></div></form></div><script>
    (new function () {
        form.render();
        this.type = "<?php echo sysconf('wechat_mch_ssl_type'); ?>" || 'p12';
        form.val('payment', {wechat_mch_ssl_type: this.type});
        form.on('radio(data-mch-type)', function (data) {
            apply(data.value);
        });
        apply.call(this, this.type);

        function apply(type) {
            $('[data-mch-type="' + type + '"]').show().siblings('[data-mch-type]').hide();
        };
        // 证书文件上传控制
        this.types = ['wechat_mch_ssl_p12', 'wechat_mch_ssl_key', 'wechat_mch_ssl_cer'];
        for (var i in this.types) $('input[name="' + this.types[i] + '"]').on('change', function () {
            var input = this, $button = $(this).next('button');
            setTimeout(function () {
                if (typeof input.value === 'string' && input.value.length > 5) {
                    $button.find('i').addClass('color-green layui-icon-vercode').removeClass('layui-icon-upload-drag');
                } else {
                    $button.find('i').removeClass('color-green layui-icon-vercode').addClass('layui-icon-upload-drag');
                }
            }, 300);
        }).trigger('change');
    });
</script></div>