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
use App\Services\PageService;
use App\Models\Data\ProjectData;

/**
 * 荣兴制冷网页版主页面
 *
 * @Controller(prefix="/rongxing/rongxing")
 */
class IndexController
{
    public $size = 6;
    /**
     * 主页面
     * @RequestMapping(route="index[.html]")
     * @View(template="rongxing/index/index", layout="layouts/rongxing.php")
     */
    public function index()
    {

        $projects = $this->changeData($start = 0, $type = 1, $have=false)['data'];
        $product = $this->changeData($start = 0, $type = 2, $have=false)['data'];

        return compact( 'projects','product');
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

        $return = $this->changeData($start,$type = 2);
        //查询工程信息
        $data = $return['data'];
        //查询工程信息总数
        $count = $return['count'];

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

        $return = $this->changeData($start,$type = 1);
        //查询工程信息
        $data = $return['data'];
        //查询工程信息总数
        $count = $return['count'];

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

    /**
     * 改变展示页面的值
     */
    private function changeData($start, $type, $have=true)
    {
        $Project = ProjectData::getInstance();
        $return = $Project->getDetail($type, $start,$this->size,$have);
        //查询工程信息
        $data = $return['data'];
        //查询工程信息总数
        $count = $return['count'];

        //处理照片信息
        $data = array_map(function($val){
            preg_match_all('/<img.*?src="(.*?)".*?>/is',$val['thumbnail'],$array);
            return array_merge($val,['showImage'=>$array[1][0]]);
        },$data);

        return ['data' => $data,'count' => $count];
    }

}