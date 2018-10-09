<?php
/**
 * Created by PhpStorm.
 * User: lanchongyang
 * Date: 2018/9/30
 * Time: 16:01
 */

namespace App\Models\Entity;

use Swoft\Db\Bean\Annotation\Id;
use Swoft\Db\Bean\Annotation\Required;
use Swoft\Db\Bean\Annotation\Table;
use Swoft\Db\Bean\Annotation\Column;
use Swoft\Db\Bean\Annotation\Entity;
use Swoft\Db\Model;
use Swoft\Db\Types;

/**
 * 产品和项目实体
 * @Entity()
 * @Table(name="project")
 */
class Project extends Model
{
    /**
     * 主键ID
     * 
     * @Id()
     * @Column(name="projectid", type=Types::INT)
     * $var null|int
     */
    private $projectid;

    /**
     * 简单描述
     * 
     * @Column(name="description", type="string")
     * @var string
     */
    private $description;

    /**
     * 发布判断
     * 
     * @Column(name="public", type="string")
     * @var string
     */
    private $public;

    /**
     * 照片地址
     * 
     * @Column(name="small", type="string")
     * @var string
     */
    private $small;

    /**
     * 缩略图地址
     * 
     * @Column(name="thumbnail", type="string")
     * @var string
     */
    private $thumbnail; 

    /**
     * 发布时间
     * 
     * @Column(name="time", type="string")
     * @var string
     */
    private $time; 

    /**
     * 内容
     * 
     * @Column(name="title", type="string")
     * @var string
     */
    private $title;     

    /**
     * 类型
     * 
     * @Column(name="type", type=Types::INT)
     * @var int
     */
    private $type; 

    /**
     * 状态
     * 
     * @Column(name="status", type=Types::INT)
     * @var int
     */
    private $status; 





}