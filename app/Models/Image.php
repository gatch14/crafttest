<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;
use Spatie\MediaLibrary\Media;
use Brackets\Media\HasMedia\HasMediaCollections;
use Brackets\Media\HasMedia\HasMediaCollectionsTrait;

class Image extends Model implements HasMediaCollections 
{
    use HasMediaCollectionsTrait;
    
    
    protected $fillable = [
        "path",
    
    ];
    
    protected $hidden = [
    
    ];
    
    protected $dates = [
        "created_at",
        "updated_at",
    
    ];

    public function registerMediaCollections() {
        $this->addMediaCollection('gallery')->accepts('image/*');
    }    
    
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute() {
        return url('/admin/images/'.$this->getKey());
    }

    
}
