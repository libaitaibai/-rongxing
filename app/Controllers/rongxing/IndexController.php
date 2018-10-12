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
        //查询产品信息
        $data = Db::query("select * from project where status>0 and type=2 order by projectid desc limit {$start},{$this->size}")->getResult();
        //查询信息总数
        $count = Db::query("select count(*) as count from project where status>0 and type=2")->getResult()[0]['count'];

        //处理照片信息
        $data = array_map(function($val){
            preg_match_all('/<img.*?src="(.*?)".*?>/is',$val['thumbnail'],$array);
            return array_merge($val,['showImage'=>$array[1][0]]);
        },$data);

        $page = new PageService($count,$this->size,$request->input());
        $page = $page->show('product');
        return compact( 'data','page');

    }

    /**
     * 工程项目页面
     * @RequestMapping(route="projects[.html]")
     * @View(template="rongxing/product/projectsList", layout="layouts/rongxing.php")
     */
    public function projects(Request $request)
    {
        $page  =  $request->input('p', 1);
        $start = $this->getPage($page);
        //查询产品信息
        $data = Db::query("select * from project where status>0 and type=1 order by projectid desc limit {$start},{$this->size}")->getResult();
        //查询信息总数
        $count = Db::query("select count(*) as count from project where status>0 and type=1")->getResult()[0]['count'];

        //处理照片信息
        $data = array_map(function($val){
            preg_match_all('/<img.*?src="(.*?)".*?>/is',$val['thumbnail'],$array);
            return array_merge($val,['showImage'=>$array[1][0]]);
        },$data);

        $page = new PageService($count,$this->size,$request->input());
        $page = $page->show('/rongxing/rongxing/projects');
        return compact( 'data','page');

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