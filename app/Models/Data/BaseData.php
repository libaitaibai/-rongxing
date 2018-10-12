<?php
/**
 * Created by PhpStorm.
 * User: lanchongyang
 * Date: 2018/10/12
 * Time: 17:18
 */

namespace App\Models\Data;

use Swoft\Bean\Annotation\Bean;

/**
 *
 * @Bean()
 * @uses      BaseData
 * @version   2017年04月25日
 * @author    stelin <phpcrazy@126.com>
 * @copyright Copyright 2010-2016 Swoft software
 * @license   PHP Version 7.x {@link http://www.php.net/license/3_0.txt}
 */
class BaseData
{
    public static $obj;
    /**
     * 初始化静态化
     */
    public function getInstance()
    {
        $class = get_called_class();
        if(!isset(self::$obj[$class])){
            self::$obj[$class] = new $class;
        }
        return self::$obj[$class];
    }
}