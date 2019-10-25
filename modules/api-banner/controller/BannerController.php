<?php
/**
 * BannerController
 * @package api-banner
 * @version 0.0.1
 */

namespace ApiBanner\Controller;

use LibFormatter\Library\Formatter;
use Banner\Model\Banner;

class BannerController extends \Api\Controller
{
    public function indexAction(){
        if(!$this->app->isAuthorized())
            return $this->resp(401);

        $cond = $this->req->getCond(['placement','type']);

        $cond['expires'] = ['__op', '>', date('Y-m-d H:i:s')];

        $banners = Banner::get($cond);
        if($banners)
            $banners = Formatter::formatMany('banner', $banners);

        $this->resp(0, $banners, null, [
            'meta' => [
                'total' => Banner::count($cond)
            ]
        ]);
    }

    public function singleAction(){
        if(!$this->app->isAuthorized())
            return $this->resp(401);

        $identity = $this->req->param->identity;

        $banner = Banner::getOne(['id'=>$identity]);
        if(!$banner)
            $banner = Banner::getOne(['name'=>$identity]);

        if(!$banner)
            return $this->show404();

        $banner = Formatter::format('banner', $banner);

        $this->resp(0, $banner);
    }
}