<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Media extends Model
{
    use HasFactory;

    protected $table = "medias";

    protected $guarded = [];

    public function category(){
        return $this->belongsTo(category::class, "category_id");
    }

    public static function create($data){
        return DB::table('medias')->insertGetId([
            'title' => $data["title"],
            // 'description' => $data["description"],
            // 'category_id' => $data["category_id"],
            // 'image' => $data["image"]
        ]);
    }
}
