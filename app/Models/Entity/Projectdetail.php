<?php
/**
 * Created by PhpStorm.
 * User: lanchongyang
 * Date: 2018/9/30
 * Time: 17:21
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
 * @Table(name="projectdetail")
 */
class Projectdetail extends Model
{
    /**
     * 主键
     * 
     * @Id()
     * @Column(name="id", type=Types::INT)
     * $var null|int
     */
    private $id;

    /**
     * 公司简介
     * 
     * @Column(name="company", type="string")
     * @var string
     */
    private $company;

    /**
     * 详细内容
     * 
     * @Column(name="content", type="text")
     * @var string 
     */
    private $content;

    /**
     * 照片地址
     * 
     * @Column(name="image", type="string")
     * @var string 
     */
    private $image;

    /**
     * 项目主键
     * 
     * @Column(name="projectid", type="string")
     * @var string 
     */
    private $projectid;

    /**
     * 时间显示
     * 
     * @Column(name="time", type="string")
     * @var string 
     */
    private $time;

    /**
     * 名称
     * 
     * @Column(name="title", type="string")
     * @var string 
     */
    private $title;

    /**
     * 状态
     * 
     * @Column(name="id", type=Types::INT)
     * $var null|int
     */
    private $status;

}