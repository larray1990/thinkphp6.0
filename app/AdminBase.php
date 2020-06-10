<?php
/**
 * Created by PhpStorm.
 * User: larray
 * Date: 2019/11/9
 * Time: 9:51
 */
declare (strict_types=1);

namespace app;

use app\model\AuthGroup;
use app\model\AuthRule;
use Endroid\QrCode\LabelAlignment;
use Endroid\QrCode\QrCode;
use think\auth\Auth;
use think\App;
use think\db\exception\DataNotFoundException;
use think\exception\HttpResponseException;
use think\facade\Cache;
use think\facade\Config;
use think\facade\Db;
use think\facade\Session;
use think\facade\View;
use think\facade\Request;
use think\Image;
use think\Response;

class AdminBase extends BaseController
{
    protected $middleware = [ 'checkLogin'];
    public function __construct(App $app)
    {
        header("Cache-control: private");  // history.back返回后输入框值丢失问题
        parent::__construct($app);
        $arr_ld = $this->getMenuCoumn();
        View::assign(['ld_arr' => $arr_ld['ld_arr'], 'ca_path_arr' => $arr_ld['ca_Path_arr']]);
    }

    /**
     * @throws DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function getCrumb()
    {
        $ld_arr = $this->getMenuCoumn()['ld_arr'];
        $crumb = [];
        $url = strtolower(Request::controller() . "/" . Request::action());
        foreach ($ld_arr as $k => $v) {
            if ($url == strtolower($v['name'])) {
                $crumb['title'] = $v['title'];
                $crumb['name'] = $v['name'];
            }
            if (!empty($v['child'])) {
                foreach ($v['child'] as $k1 => $v1) {
                    if ($url == strtolower($v1['name'])) {
                        $crumb['name'] = $v['name'];
                        $crumb['title'] = $v['title'];
                        $crumb['name1'] = $v1['name'];
                        $crumb['title1'] = $v1['title'];
                    }
                }
            }
        }
        View::assign(['brumb' => $crumb]);
    }

    /**
     * @return array
     * @throws DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    protected function getMenuCoumn()
    {
        $ids = AuthGroup::where(['id' => Session::get('role_id'), 'status' => 1])->value('rules');
        $data=AuthRule::where('id','in',$ids)->where('level','<','3')->order('sort asc')->select()->toArray();
        $url = strtolower(Request::controller());
        $ld_arr = $ca_Path_arr = [];
        foreach ($data as $k => $v) {
            if($v['level']==1){
                $ld_arr[$k]['id'] = $v['id'];
                $ld_arr[$k]['title'] = $v['title'];
                $ld_arr[$k]['name'] = $v['name'] == null ? 'javascript:;' : $v['name'];
                $ld_arr[$k]['icon'] = $v['icon'];
            }
        }
        foreach ($ld_arr as $k1 => $v1) {
            foreach ($data as $k2 => $v2) {
                $arr=[];
                if($v2['level']==2){
                    if($v1['id']==$v2['pid']){
                        $arr['title'] = $v2['title'];
                        $arr['name'] = $v2['name'] == null ? 'javascript:;' : $v2['name'];
                        $arr['icon'] = $v2['icon'];
                        $ld_arr[$k1]['child'][] = $arr;
                    }
                    $thre_rule = AuthRule::where('pid',$v2['id'])->where('status', 1)->field('name,title')->select()->toArray();
                    foreach ($thre_rule as $k3 => $v3) {
                        if ($url == strtolower(explode('/', $v3['name'])[1])) {
                            $ca_Path_arr[] = $v3['name'];
                        }
                    }
                }
            }
        }
        $data = ['ld_arr' => $ld_arr, 'ca_Path_arr' => $ca_Path_arr];
        return $data;
    }

    /**
     * 生成二维码
     * @param $config
     * @return string
     * @throws \Endroid\QrCode\Exception\InvalidPathException
     */
    public function create_qrcode($config)
    {
        $qrCode = new QrCode($config['url']);
        if ($config['title']) {
            $qrCode->setLabel($config['title_content'], 16, null, LabelAlignment::CENTER);
        }
        // 是否需要logo
        if ($config['logo']) {
            $qrCode->setLogoPath($config['logo_url']);
            $qrCode->setLogoWidth($config['logo_size']);
        }
        $qrCode->setRoundBlockSize(true);
        // 保存二维码图片
        // $qrCode->writeFile('./static/qrcode/'.rand(1,99999999).time().'.png');
        header('Content-Type: '.$qrCode->getContentType());
        return $qrCode->writeString();
    }

    /**
     * 生成缩略图
     * @param $img_url
     * @param int $width
     * @param int $height
     * @param int $rad
     * @param $save_url
     */
    public function createThumb($img_url,$width=150,$height=150,$rad=50,$save_url)
    {
        $image = Image::open($img_url);
        // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.png
        $image->thumb($width, $height)->radius($rad)->save($save_url);
        
    }

}