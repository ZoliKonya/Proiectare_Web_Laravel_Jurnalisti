<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public $fillable = ['id','categorie','name', 'autor', 'data', 'description', 'aprobat'];
}
