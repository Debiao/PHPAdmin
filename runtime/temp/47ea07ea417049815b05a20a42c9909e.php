<?php /*a:2:{s:74:"/Users/mac/Desktop/ThinkAdmin-5/application/service/view/config/index.html";i:1564341490;s:64:"/Users/mac/Desktop/ThinkAdmin-5/application/admin/view/main.html";i:1564341490;}*/ ?>
<div class="layui-card layui-bg-gray"><style>
    .right-btn {
        top: 0;
        right: 0;
        width: 38px;
        height: 38px;
        display: inline-block;
        position: absolute;
        text-align: center;
        line-height: 38px;
    }
</style><?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?><div class="layui-card-header layui-anim layui-anim-fadein notselect"><span class="layui-icon layui-icon-next font-s10 color-desc margin-right-5"></span><?php echo htmlentities((isset($title) && ($title !== '')?$title:'')); ?><div class="pull-right"></div></div><?php endif; ?><div class="layui-card-body layui-anim layui-anim-upbit"><div class="relative"><div class="think-box-shadow border-0 margin-bottom-20">
        强烈建议安装 YAR 扩展来实现接口通信，SOAP 不能正常显示接口的异常信息
    </div><div class="layui-row layui-col-space15"><div class="layui-col-lg6"><fieldset class="think-box-shadow"><legend class="layui-bg-cyan">授权参数</legend><form onsubmit="return false;" action="<?php echo url('save'); ?>" data-auto="true" method="post" class='layui-form padding-left-20 padding-right-20' autocomplete="off"><div class="layui-form-item"><label class="relative block"><span class="color-green">开放平台服务 AppID</span><input name="component_appid" required pattern="^.{18}$" maxlength="18" placeholder="请输入18位开放平台服务AppID" value="<?php echo sysconf('component_appid'); ?>" class="layui-input"></label><p class="help-block">开放平台服务 AppID，需要在微信开放平台获取</p></div><div class="layui-form-item"><label class="relative block"><span class="color-green">开放平台服务 AppSecret</span><input name="component_appsecret" required pattern="^.{32}$" maxlength="32" placeholder="请输入32位开放平台服务AppSecret" value="<?php echo sysconf('component_appsecret'); ?>" class="layui-input"></label><p class="help-block">开放平台服务 AppSecret，需要在微信开放平台获取</p></div><div class="layui-form-item"><label class="relative block"><span class="color-green">开放平台消息校验 Token</span><input name="component_token" required placeholder="请输入微信消息校验Token" value="<?php echo sysconf('component_token'); ?>" class="layui-input"></label><p class="help-block">开发者在代替微信接收到消息时，用此 Token 来校验消息</p></div><div class="layui-form-item"><label class="relative block"><span class="color-green">开放平台消息加解密 AesKey</span><input name="component_encodingaeskey" required pattern="^.{43}$" maxlength="43" placeholder="请输入43位微信消息加解密Key" value="<?php echo sysconf('component_encodingaeskey'); ?>" class="layui-input"></label><p class="help-block">在代替微信收发消息时使用，必须是长度为43位字母和数字组合的字符串</p></div><div class="hr-line-dashed"></div><div class="text-center padding-bottom-15 margin-bottom-20"><button class="layui-btn" type="submit">保存配置</button></div></form></fieldset></div><div class="layui-col-lg6"><fieldset class="think-box-shadow"><legend class="layui-bg-cyan">对接信息</legend><div class="padding-right-20 padding-left-20"><div class="layui-form-item"><p class="color-green">授权发起页域名</p><label class="relative block"><input disabled class="layui-input layui-bg-gray" value="<?php echo request()->host(); ?>"><a data-copy="<?php echo request()->host(); ?>" class="fa fa-copy right-btn"></a></label><p class="help-block">从本域名跳转到登录授权页才可以完成登录授权，无需填写域名协议前缀</p></div><div class="layui-form-item"><p class="color-green">授权事件接收 URL</p><label class="relative block"><input disabled class="layui-input layui-bg-gray" value="<?php echo url('@service/api.push/ticket','',false,true); ?>"><a data-copy="<?php echo url('@service/api.push/ticket','',false,true); ?>" class="fa fa-copy right-btn"></a></label><p class="help-block">用于接收取消授权通知、授权成功通知、授权更新通知、接收 TICKET 凭据</p></div><div class="layui-form-item"><p class="color-green">微信消息与事件接收 URL</p><label class="relative block"><input disabled class="layui-input layui-bg-gray" value="<?php echo url('@service/api.push/notify/$APPID$','',false,true); ?>"><a data-copy="<?php echo url('@service/api.push/notify/$APPID$','',false,true); ?>" class="fa fa-copy right-btn"></a></label><p class="help-block">通过该 URL 接收微信消息和事件推送，$APPID$ 将被替换为微信 AppId</p></div><div class="layui-form-item"><p class="color-green">客户端系统 Yar 模块接口</p><label class="relative block"><input disabled class="layui-input layui-bg-gray" value="<?php echo url('@service/api.client/yar/PARAM','',false,true); ?>"></label><p class="help-block">客户端 Yar 接口，PARAM 规则 AppName-AppId-AppKey-AppType</p></div><div class="layui-form-item"><p class="color-green">客户端系统 Soap 模块接口</p><label class="relative block"><input disabled class="layui-input layui-bg-gray" value="<?php echo url('@service/api.client/soap/PARAM','',false,true); ?>"></label><p class="help-block">客户端 Soap 接口，PARAM 规则 AppName-AppId-AppKey-AppType</p></div></div></fieldset></div></div></div></div></div>