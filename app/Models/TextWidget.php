<?php

namespace App\Models;

use Filament\Widgets\Widget;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class TextWidget extends Model
{
    use HasFactory;

    protected $fillable = [
        "key",
        "image",
        "title",
        "content",
        "active"
    ];

    protected static function queryWidget(string $key): TextWidget{
        return Cache::get("text-widget-".$key, function() use($key){
            return TextWidget::query()
            ->where("key", "=", $key)
            ->where("active", "=", 1)
            ->first();
        });
    }

    public static function getTitle(string $key): string
    {
        $widget = TextWidget::queryWidget($key);

        if($widget){
            return $widget->title;
        }

        return " ";
    }

    public static function getContent(string $key):string
    {
        $widget = TextWidget::queryWidget($key);

        if($widget){
            return $widget->content;
        }

        return "";
    }

}
