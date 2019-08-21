<?php

// +----------------------------------------------------------------------
// | framework
// +----------------------------------------------------------------------

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
     * SDK免签打包配置
     * @return mixed
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
//    public function m_build()
//    {
//        $this->applyCsrfToken();
//        $this->_clear_build_cache();
//        $this->title = 'SDK免签打包配置';
//        if ($this->request->isGet()) {
//            $file = File::instance('local');
//            return $this->fetch();
//        }
////        $git = $this->request->post('git_address');
//        // 取出证书
//        $p12 = '/Users/xueyangcan/dev/cer/cer.p12';
//        $mobileprovision = '/Users/xueyangcan/dev/cer/eigo.mobileprovision';
//        if($this->request->post('wechat_mch_ssl_key')){
//            $p12 = env('root_path').'safefile/'.$this->request->post('wechat_mch_ssl_key');
//        }
//        if($this->request->post('wechat_mch_ssl_cer')){
//            $mobileprovision = env('root_path').'safefile/'.$this->request->post('wechat_mch_ssl_cer');
//        }
//        // 其他参数
//        $version = $this->request->post("version");
//        $p_name  = $this->request->post("p_name");
//        // 0=>381-shabake 1=>401-dingdingmao
//        switch ($p_name) {
//            case 0:
//                $p_name = '401-dingdingmao_m';
//                break;
//            case 1:
//                $p_name = '400-leju_m';
//                break;
//            default:
//                break;
//        }
//        $build_type = $this->request->post("build_type") ? $this->request->post("build_type") : 2;
//        $build_type = ($build_type == 'ad hoc') ? 2 : 1;
//        $bundle_id  = $this->request->post("bundle_id");
//        $specifier  = $this->request->post("specifier");
//        $p12_pwd    = $this->request->post("p12_pwd");
//        $data       = [
//            'project_name' => $this->request->post("project_name"),
//            'project_id'   => $this->request->post("project_id"),
//            'version'      => $version,
//            'custom_name'  => $p_name,
//            'build_type'   => $build_type,
//            'bundle_id'    => $bundle_id,
//            'specifier'    => $specifier,
//            'p12_pwd'      => $p12_pwd,
//            'status'       => 0,
//            'type'         => 2,
//        ];
//
//        // 拉取分支代码
//        exec('cd /Users/xueyangcan/dev/pro/sdkbuild/huosdk_v8_ios; git pull', $git_res, $git_op);
//        if ($git_res) {
//            // 运行脚本
//            exec('cd /Users/xueyangcan/dev/pro/sdkbuild/huosdk_v8_ios/sdk/iosm/huosdkProject; ./shell.sh ' . $p_name . ' ' . $build_type . ' ' . $bundle_id . ' ' . $specifier . ' ' . $mobileprovision . ' ' . $p12 . ' ' . $p12_pwd, $retArr, $output);
//            if ($retArr) {
//                // 入库
//                if($this->_check_build_res()==1) $data['status'] = 1;
//                if (!empty($data)) Db::name('SdkBuild')->insert($data);
//                // 写入日志
//                file_put_contents('/Users/xueyangcan/dev/ThinkAdmin/log/build/log.log', implode('', $retArr));
//                // 结束脚本，此时可回调
//                $this->success('打包结束！','admin.html#/wechat/fans/index.html?spm=m-16-17-18');
//            }
//        }
//    }

    /**
     * SDK切换打包配置
     * @return mixed
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */

//    public function payment()
//    {
//        $this->applyCsrfToken();
//        $this->_clear_build_cache();
//        $this->title = 'SDK切换打包配置';
//        if ($this->request->isGet()) {
//            $file = File::instance('local');
//            return $this->fetch();
//        }
////        $git = $this->request->post('git_address');
//        // 取出证书
//        $p12 = '/Users/xueyangcan/dev/cer/cer.p12';
//        $mobileprovision = '/Users/xueyangcan/dev/cer/eigo.mobileprovision';
//        if($this->request->post('wechat_mch_ssl_key')){
//            $p12 = env('root_path').'safefile/'.$this->request->post('wechat_mch_ssl_key');
//        }
//        if($this->request->post('wechat_mch_ssl_cer')){
//            $mobileprovision = env('root_path').'safefile/'.$this->request->post('wechat_mch_ssl_cer');
//        }
//        // 其他参数
//        $version = $this->request->post("version");
//        $p_name  = $this->request->post("p_name");
//        // 0=>381-shabake 1=>401-dingdingmao
//        switch ($p_name) {
//            case 0:
//                $p_name = '381-shabake';
//                break;
//            case 1:
//                $p_name = '401-dingdingmao';
//                break;
//            default:
//                break;
//        }
//        $build_type = $this->request->post("build_type") ? $this->request->post("build_type") : 2;
//        $build_type = ($build_type == 'ad hoc') ? 2 : 1;
//        $bundle_id  = $this->request->post("bundle_id");
//        $specifier  = $this->request->post("specifier");
//        $p12_pwd    = $this->request->post("p12_pwd");
//        $data       = [
//            'project_name' => $this->request->post("project_name"),
//            'project_id'   => $this->request->post("project_id"),
//            'version'      => $version,
//            'custom_name'  => $p_name,
//            'build_type'   => $build_type,
//            'bundle_id'    => $bundle_id,
//            'specifier'    => $specifier,
//            'p12_pwd'      => $p12_pwd,
//            'status'       => 0,
//            'type'         => 1,
//        ];
//
//        // 拉取分支代码
//        exec('cd /Users/xueyangcan/dev/pro/sdkbuild/huosdk_v8_ios; git pull', $git_res, $git_op);
//        if ($git_res) {
//            // 运行脚本
//            exec('cd /Users/xueyangcan/dev/pro/sdkbuild/huosdk_v8_ios/sdk/iosq/sdk; ./shell.sh ' . $p_name . ' ' . $build_type . ' ' . $bundle_id . ' ' . $specifier . ' ' . $mobileprovision . ' ' . $p12 . ' ' . $p12_pwd, $retArr, $output);
//            if ($retArr) {
//                // 入库
//                if($this->_check_build_res()==1) $data['status'] = 1;
//                if (!empty($data)) Db::name('SdkBuild')->insert($data);
//                // 写入日志
//                file_put_contents('/Users/xueyangcan/dev/ThinkAdmin/log/build/log.log', implode('', $retArr));
//                // 结束脚本，此时可回调
//                $this->success('打包结束！','admin.html#/wechat/fans/index.html?spm=m-16-17-18');
//            }
//        }
//    }



    /**
     * 普通打包配置(目前svn有500out,bdcf)
     * @return mixed
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function build()
    {
        $this->applyCsrfToken();
        $this->_clear_build_cache();
        $this->title = '普通打包配置';
        if ($this->request->isGet()) {
            $file = File::instance('local');
            return $this->fetch();
        }
        // 取出证书
        $p12             = '/Users/xueyangcan/dev/cer/cer.p12';
        $mobileprovision = '/Users/xueyangcan/dev/cer/eigo.mobileprovision';
        if ($this->request->post('wechat_mch_ssl_key')) {
            $p12 = env('root_path') . 'safefile/' . $this->request->post('wechat_mch_ssl_key');
        }
        if ($this->request->post('wechat_mch_ssl_cer')) {
            $mobileprovision = env('root_path') . 'safefile/' . $this->request->post('wechat_mch_ssl_cer');
        }
        $version = $this->request->post("version");
        $p_name  = $this->request->post("p_name");
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
        $bundle_id  = $this->request->post("bundle_id");
        $specifier  = $this->request->post("specifier");
        $p12_pwd    = $this->request->post("p12_pwd");
        $data       = [
            'project_name' => $this->request->post("project_name"),
            'project_id'   => $this->request->post("project_id"),
            'version'      => $version,
            'custom_name'  => $p_name,
            'build_type'   => $build_type,
            'bundle_id'    => $bundle_id,
            'specifier'    => $specifier,
            'p12_pwd'      => $p12_pwd,
            'status'       => 0,
            'type'         => 3,
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
        $sdkq    = array('381-shabake', '401-dingdingmao');
        $sdkm    = array('401-dingdingmao_m', '400-leju_m');
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
