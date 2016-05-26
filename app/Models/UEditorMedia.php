<?php
/**
 * Created by PhpStorm.
 * User: qijingyu
 * Date: 2016/3/30
 * Time: 21:00
 */
namespace DaJiaYin\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class About
 * @package DaJiaYin\Models
 */
class UEditorMedia extends Model
{
    protected $table = 'Upload';
    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = ['route', 'media_name', 'user_id', 'size', 'media_type'];



}