<?php

namespace app\wechat\controller;

use app\wechat\service\Wechat;
use library\Controller;
use library\File;
use library\tools\Data;
use think\Db;

/**
 * 打包配置
 * Class Config
 * @package app\wechat\controller
 */
class Config extends Controller
{

    /**
     * 打包结果存放路径
     * @var string
     */
    protected $build_res_url = '/Users/sundebiao/Desktop/ipa';

    /**
     * 普通打包配置(目前svn有500out,bdcf)
     * @return mixed
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function index()
    {
        $this->applyCsrfToken();
        $this->_clear_build_cache();
        $this->title = '普通打包配置';
        if ($this->request->isGet()) {
            $file = File::instance('local');
            return $this->fetch();
        }
//        exec('cd /Users/sundebiao/Desktop/ ./build.sh ');

        // 取出证书
        $p12 = '/Users/sundebiao/Desktop/cer.p12';
        $mobileprovision = '/Users/sundebiao/Desktop/dis_gzxs.mobileprovision';
        if ($this->request->post('wechat_mch_ssl_key')) {
            $p12 = env('root_path') . 'safefile/' . $this->request->post('wechat_mch_ssl_key');
        }
        if ($this->request->post('wechat_mch_ssl_cer')) {
            $mobileprovision = env('root_path') . 'safefile/' . $this->request->post('wechat_mch_ssl_cer');
        }
        $version = $this->request->post("version");
        $p_name = $this->request->post("p_name");
        switch ($p_name) {
            case 0:
                $p_name = 'shabake';
                break;
            case 1:
                $p_name = 'shengling';
                break;
            case 2:
                $p_name = 'v8';
                break;
            case 3:
                $p_name = 'youwan';
                break;
            default:
                break;
        }

        $build_type = $this->request->post("build_type") ? $this->request->post("build_type") : 2;
        $build_type = ($build_type == 'appstore') ? 1 : 2;
        $bundle_id = $this->request->post("bundle_id");
        $specifier = $this->request->post("specifier");
        $p12_pwd = $this->request->post("p12_pwd");
        $data = [
            'project_name' => $this->request->post("project_name"),
            'project_id' => $this->request->post("project_id"),
            'version' => $version,
            'custom_name' => $p_name,
            'build_type' => $build_type,
            'bundle_id' => $bundle_id,
            'specifier' => $specifier,
            'p12_pwd' => $p12_pwd,
            'status' => 0,
            'type' => 3,
        ];
        $bp_name = $this->_get_project_name($p_name);
        // 拉取分支代码
        exec('cd /Users/xueyangcan/dev/pro/' . $bp_name . '/huosdk_v8_ios; git pull', $git_res, $git_op);
        if ($git_res) {
            // copy一份到build
            $fileName = date('Y-m-d H:i:s');
            exec('cp -r /Users/xueyangcan/dev/pro/' . $bp_name . ' /Users/xueyangcan/dev/build/' . $fileName, $cp_res, $cp_op);
            if ($cp_res) {
                // 切换环境
                exec('cd /Users/xueyangcan/dev/build/' . $fileName . $bp_name . '/huosdk_v8_ios/app/HuoGameBox; ./switch_environment.sh ' . $p_name, $sw_res, $sw_op);
                if ($sw_res) {
                    // 运行脚本
                    exec('cd /Users/xueyangcan/dev/build/' . $fileName . $bp_name . '/huosdk_v8_ios/app/HuoGameBox; ./build.sh ' . $p_name . ' ' . $build_type . ' ' . $bundle_id . ' ' . $specifier . ' ' . $mobileprovision . ' ' . $p12 . ' ' . $p12_pwd, $retArr, $output);
                    if ($retArr) {
                        // 入库
                        if ($this->_check_build_res() == 1) $data['status'] = 1;
                        if (!empty($data)) Db::name('SdkBuild')->insert($data);
                        // 写入日志
                        file_put_contents('/Users/xueyangcan/dev/ThinkAdmin/log/build/log.log', implode('', $retArr));
                        // 结束脚本，此时可回调
                        $this->success('打包结束！', 'admin.html#/wechat/fans/index.html?spm=m-16-17-18');
                    }
                }
            }
        }
    }

    /**
     * 内部方法 获取母包对应的项目名
     * @return mixed
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    protected function _get_project_name($p_name)
    {
        $general = array('shabake', 'shengling', 'v8', 'youwan');
        $sdkq = array('381-shabake', '401-dingdingmao');
        $sdkm = array('401-dingdingmao_m', '400-leju_m');
        if (in_array($p_name, $general)) return 'generalbuild';
        if (in_array($sdkq, $general)) return 'sdkbuild';
        if (in_array($p_name, $general)) return 'sdkbuild';
        return $p_name;
    }

    /**
     * 内部方法 检查打包结果
     * @return mixed
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    protected function _check_build_res()
    {
        $ret = exec('cat ' . $this->build_res_url . '/res.txt', $res, $output);
        if ($ret == 1) return 1;
        return 0;
    }

    /**
     * 内部方法 清除打包生成的一些文件
     * @return mixed
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    protected function _clear_build_cache()
    {
        exec('cd ' . $this->build_res_url . '; rm -f res.txt', $res, $output);
    }
}






// +----------------------------------------------------------------------
//// | ThinkAdmin
//// +----------------------------------------------------------------------
//// | 版权所有 2014~2019 广州楚才信息科技有限公司 [ http://www.cuci.cc ]
//// +----------------------------------------------------------------------
//// | 官方网站: http://demo.thinkadmin.top
//// +----------------------------------------------------------------------
//// | 开源协议 ( https://mit-license.org )
//// +----------------------------------------------------------------------
//// | gitee 代码仓库：https://gitee.com/zoujingli/ThinkAdmin
//// | github 代码仓库：https://github.com/zoujingli/ThinkAdmin
//// +----------------------------------------------------------------------
//
//namespace app\wechat\controller;
//
//use app\wechat\service\WechatService;
//use library\Controller;
//use library\File;
//
///**
// * 微信授权绑定
// * Class Config
// * @package app\wechat\controller
// */
//class Config extends Controller
//{
//    /**
//     * 微信授权绑定
//     * @auth true
//     * @menu true
//     * @throws \think\Exception
//     * @throws \think\exception\PDOException
//     */
//    public function options()
//    {
//        $this->applyCsrfToken();
//        $this->thrNotify = url('@wechat/api.push', '', false, true);
//        if ($this->request->isGet()) {
//            $this->title = '微信授权绑定';
//            if (!($this->geoip = cache('mygeoip'))) {
//                cache('mygeoip', $this->geoip = gethostbyname($this->request->host()), 360);
//            }
//            $code = encode(url('@admin', '', true, true) . '#' . $this->request->url());
//            $this->authurl = config('wechat.service_url') . "/service/api.push/auth/{$code}";
//            if (input('?appid') && input('?appkey')) {
//                sysconf('wechat_type', 'thr');
//                sysconf('wechat_thr_appid', input('appid'));
//                sysconf('wechat_thr_appkey', input('appkey'));
//                WechatService::wechat()->setApiNotifyUri($this->thrNotify);
//            }
//            try {
//                $this->wechat = WechatService::wechat()->getConfig();
//            } catch (\Exception $e) {
//                $this->wechat = [];
//            }
//            $this->fetch();
//        } else {
//            foreach ($this->request->post() as $k => $v) sysconf($k, $v);
//            if ($this->request->post('wechat_type') === 'thr') {
//                WechatService::wechat()->setApiNotifyUri($this->thrNotify);
//            }
//            sysoplog('微信管理', '修改微信授权配置成功');
//            $uri = url('wechat/config/options');
//            $this->success('微信参数修改成功！', url('@admin') . "#{$uri}");
//        }
//    }
//
//    /**
//     * 微信支付配置
//     * @auth true
//     * @menu true
//     * @throws \think\Exception
//     * @throws \think\exception\PDOException
//     */
//    public function payment()
//    {
//        $this->applyCsrfToken();
//        if ($this->request->isGet()) {
//            $this->title = '微信支付配置';
//            $file = File::instance('local');
//            $this->wechat_mch_ssl_cer = sysconf('wechat_mch_ssl_cer');
//            $this->wechat_mch_ssl_key = sysconf('wechat_mch_ssl_key');
//            $this->wechat_mch_ssl_p12 = sysconf('wechat_mch_ssl_p12');
//            if (!$file->has($this->wechat_mch_ssl_cer, true)) $this->wechat_mch_ssl_cer = '';
//            if (!$file->has($this->wechat_mch_ssl_key, true)) $this->wechat_mch_ssl_key = '';
//            if (!$file->has($this->wechat_mch_ssl_p12, true)) $this->wechat_mch_ssl_p12 = '';
//            $this->fetch();
//        } else {
//            if ($this->request->post('wechat_mch_ssl_type') === 'p12') {
//                if (!($sslp12 = $this->request->post('wechat_mch_ssl_p12'))) {
//                    $mchid = $this->request->post('wechat_mch_id');
//                    $content = File::instance('local')->get($sslp12, true);
//                    if (!openssl_pkcs12_read($content, $certs, $mchid)) {
//                        $this->error('商户MCH_ID与支付P12证书不匹配！');
//                    }
//                }
//            }
//            foreach ($this->request->post() as $k => $v) sysconf($k, $v);
//            sysoplog('微信管理', '修改微信支付配置成功');
//            $this->success('微信支付配置成功！');
//        }
//    }
//
//}
