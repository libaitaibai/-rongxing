<?php
/**
 * Created by PhpStorm.
 * User: lanchongyang
 * Date: 2018/9/29
 * Time: 15:18
 */

namespace App\Controllers\Rongxing;

use Swoft\App;
use Swoft\Http\Server\Bean\Annotation\Controller;
use Swoft\Http\Server\Bean\Annotation\RequestMapping;
use Swoft\Http\Server\Bean\Annotation\RequestMethod;
use Swoft\Http\Message\Server\Request;
use Swoft\Log\Log;
use Swoft\View\Bean\Annotation\View;
use Swoft\Contract\Arrayable;
use Swoft\Http\Server\Exception\BadRequestException;
use Swoft\Http\Message\Server\Response;

/**
 * 荣兴制冷网页版主页面
 *
 * @Controller(prefix="/rongxing/rongxing")
 */
class IndexController
{
    /**
     * 主页面
     * @RequestMapping(route="index")
     * @View(template="rongxing/index")
     */
    public function index()
    {
        return [];
    }

    /**
     * 定义一个route,支持get和post方式，处理uri=/demo2/index.
     *
     * @RequestMapping(route="index1", method={RequestMethod::GET, RequestMethod::POST})
     *
     * @param Request $request
     *
     * @return array
     */
    public function index1(Request $request)
    {
        // 获取所有GET参数
        $get = $request->query();
        // 获取name参数默认值defaultName
        $getName = $request->query('name', 'defaultName');
        // 获取所有POST参数
        $post = $request->post();
        // 获取name参数默认值defaultName
        $postName = $request->post('name', 'defaultName');
        // 获取所有参，包括GET或POST
        $inputs = $request->input();
        // 获取name参数默认值defaultName
        $inputName = $request->input('name', 'defaultName');

        return compact('get', 'getName', 'post', 'postName', 'inputs', 'inputName');
    }

}