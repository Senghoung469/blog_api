<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class PostModel extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = ['user_id','title','description','thumbnail','tag_id','content','status'];
}
