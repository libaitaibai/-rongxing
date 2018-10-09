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

/**
 * 荣兴制冷网页版主页面
 *
 * @Controller(prefix="/rongxing/rongxing")
 */
class IndexController
{
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
     * 产品展示页面
     * @RequestMapping(route="product[.html]")
     * @View(template="rongxing/product/productList", layout="layouts/rongxing.php")
     */
    public function product()
    {
        $Project = new Project();
//        $result = Projectdetail::findAll(['status','>',0])->getResult();
//        $result = Projectdetail::findById(1)->getResult();
        $result = Db::query('select * from project where status>0 order by projectid desc limit 0,6')->getResult();
//        $result = Db::query('select * from project where projectid=1')->getResult();
        var_dump($result);
    }



}