<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['house_id', 'path', 'is_main'];

    public function house()
    {
        return $this->belongsTo(House::class);
    }
}