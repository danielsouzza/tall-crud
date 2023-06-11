<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "slug",
        "thumbnail",
        "body",
        "active",
        "published_at",
        "user_id"
    ];

    protected $casts = [
        "published_at" => "datetime"
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function shortBody(): string{
        $lengh = strlen($this->body);
        if($lengh >= 30){
            return substr(strip_tags($this->body),0 ,150);
        }
        return strip_tags($this->body);
    }

    public function getFormattedData(){
        return $this->published_at->format("F jS Y");
    }
    public function getThumbnail(){
        if(str_starts_with($this->thumbnail, "http")){
            return $this->thumbnail;

        }
        return "/storage/".$this->thumbnail;
    }
}
