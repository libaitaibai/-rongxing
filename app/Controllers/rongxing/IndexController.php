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

use App\Models\Entity\Project;
use App\Models\Entity\User;
use App\Models\Entity\Projectdetail;
use Swoft\Db\Db;
use Swoft\Db\Query;
use App\Services\PageService;

/**
 * 荣兴制冷网页版主页面
 *
 * @Controller(prefix="/rongxing/rongxing")
 */
class IndexController
{
    //分页显示数据
    private $size = 6;

    /**
     * 主页面
     * @RequestMapping(route="index[.html]")
     * @View(template="rongxing/index/index", layout="layouts/rongxing.php")
     */
    public function index()
    {
        return [];
    }

    /**
     * 关于我们
     * @RequestMapping(route="about[.html]")
     * @View(template="rongxing/index/about", layout="layouts/rongxing.php")
     */
    public function about()
    {
        return [];
    }

    /**
     * 联系我们
     * @RequestMapping(route="contact[.html]")
     * @View(template="rongxing/index/contact", layout="layouts/rongxing.php")
     */
    public function contact()
    {
        return [];
    }



    /**
     * 产品展示页面
     * @RequestMapping(route="product[.html]")
     * @View(template="rongxing/product/productList", layout="layouts/rongxing.php")
     */
    public function product(Request $request)
    {
        $page  =  $request->input('p', 1);
        $start = $this->getPage($page);
        $data = Db::query("select * from project where status>0 and type=2 order by projectid desc limit {$start},{$this->size}")->getResult();
        $count = Db::query("select count(*) as count from project where status>0 and type=2")->getResult()[0]['count'];
        var_dump($data,$count,$this->size);
        $page = new PageService($count,$this->size);
        $page = $page->show('product');
        return compact('count', 'data','page');

    }


    /**
     * 获得分页数据
     */
    private function getPage($page)
    {
        $start = ($page-1)*($this->size);
        return $start;
    }

}