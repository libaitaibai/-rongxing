<?php
/**
 * Created by PhpStorm.
 * User: lanchongyang
 * Date: 2018/10/12
 * Time: 17:13
 */

namespace App\Models\Data;

use Swoft\Bean\Annotation\Bean;
use Swoft\Db\Db;

/**
 *
 * @Bean()
 * @uses      ProjectData
 * @version   2017年04月25日
 * @author    stelin <phpcrazy@126.com>
 * @copyright Copyright 2010-2016 Swoft software
 * @license   PHP Version 7.x {@link http://www.php.net/license/3_0.txt}
 */
class ProjectData extends BaseData
{

    /**
     * 获得产品和工程信息
     */
    public function getDetail($type = 1, $start = 0, $size = 6, $have = true)
    {
        //查询产品信息
        $data = Db::query("select * from project where status>0 and type={$type} order by projectid desc limit {$start},{$size}")->getResult();
        //查询信息总数
        $count = $have ? Db::query("select count(*) as count from project where status>0 and type={$type}")->getResult()[0]['count'] : 1;

        return ['data' => $data, 'count' => $count];
    }
}