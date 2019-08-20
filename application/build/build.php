<?php

// +----------------------------------------------------------------------
// | framework
// +----------------------------------------------------------------------


namespace app\wechat\controller;

use app\admin\service\Queue;
use app\wechat\queue\Jobs;
use app\wechat\service\Wechat;
use library\Controller;
use think\Db;
use think\exception\HttpResponseException;

/**
 * 打包管理
 * Class Fans
 * @package app\wechat\controller
 */
class Fans extends Controller
{
    /**
     * 绑定数据表
     * @var string
     */
    protected $table = 'SdkBuild';

    /**
     * 打包记录
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     */
    public function index()
    {
        $this->title = '打包记录';
        $this->_query($this->table)->like('project_name,project_id,status')->dateBetween('create_at')->order('id desc')->page();
    }

    /**
     * 列表数据处理
     * @param array $data
     */
    protected function _index_page_filter(array &$data)
    {
        
    }

    /**
     * 下载app
     */
    public function setBlack()
    {
//        $this->error('下载暂未开放');
        $this->applyCsrfToken();
        $file_name = "WebSDKDemo.ipa";     //下载文件名
        $file_dir = "/Users/xueyangcan/dev/pro/sdkbuild/huosdk_v8_ios/sdk/iosq/demo/IPADir/Debug/";        //下载文件存放目录
        //检查文件是否存在
        if (! file_exists ( $file_dir . $file_name )) {
            $this->error('文件找不到');
        } else {
            return download($file_dir.$file_name,'iOSApp.ipa');
        }
    }

}
