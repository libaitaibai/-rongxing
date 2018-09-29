<?php
/**
 * Created by PhpStorm.
 * User: lanchongyang
 * Date: 2018/9/29
 * Time: 15:18
 */

namespace App\Controllers\rongxing;

/**
 * 荣兴制冷网页版主页面
 * @Controller(prefix="/rongxing")
 */
class IndexController
{
    /**
     * 主页面
     * @RequestMapping(route="index")
     */
    public function index()
    {
        echo '123';
    }

}