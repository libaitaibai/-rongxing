<?php
/**
 * Created by PhpStorm.
 * User: lanchongyang
 * Date: 2018/10/15
 * Time: 11:16
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
 * 产品和项目工程详细列表页面
 * @Controller(prefix="/rongxing/project")
 */
class ProjectController
{
    /**
     * 项目工程详细页面
     * @RequestMapping(route="project[.html]")
     * @View(template="rongxing/product/projectDetail", layout="layouts/rongxing.php")
     */
    public function project()
    {
        return [];
    }

    /**
     * 产品展示详细页面
     * @RequestMapping(route="product[.html]")
     * @View(template="rongxing/index/about", layout="layouts/rongxing.php")
     */
    public function product()
    {

    }
}