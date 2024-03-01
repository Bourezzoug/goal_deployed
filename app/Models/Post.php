<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['author_id','category_id','title','seo_title','excerpt','body','image','slug','meta_description','tags','status','featured','nb_vues','source','source_link','planned','ordre','lien_video','video_youtube','publication_date','mise_avant'];

    public function user() {
        return $this->belongsTo(User::class, 'author_id');
    }
    public function category() {
        return $this->belongsTo(Category::class);
    }
    
    public function scopeSearch($query, $term){
        $query->where(function ($query) use ($term){
            $query->where('title','like', "%$term%")
                ->orWhere('seo_title','like', "%$term%")
                ->orWhere('source','like', "%$term%");
        });
    }

}
