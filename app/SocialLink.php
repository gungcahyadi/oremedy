<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
    protected $table = 'sociallinks';
    protected $fillable = [
        'platform', 'link', 'published'
    ];

    public static function platformList()
    {
        return [
            'dribbble' => 'Dribbble',
            'facebook' => 'Facebook',
            'twitter' => 'Twitter',
            'instagram' => 'Instagram',
            'tumblr' => 'Tumblr',
            'google-plus' => 'Google Plus',
            'flickr' => 'Flickr',
            'linkedin' => 'Linkedin',
            'pinterest' => 'Pinterest',
            'slack' => 'Slack',
            'stumbleupon' => 'Stumbleupon',
            'tripadvisor' => 'TripAdvisor',
            'vimeo' => 'Vimeo',
            'youtube' => 'Youtube'
        ];
    }

    public function getHumanPlatformAttribute()
    {
        return static::platformList()[$this->platform];
    }

    public static function allowedPlatform()
    {
        return array_keys(static::platformList());
    }

    public static function platformFaviconList()
    {
        return [
            'dribbble' => 'fa-dribbble',
            'facebook' => 'fa-facebook',
            'twitter' => 'fa-twitter',
            'instagram' => 'fa-instagram',
            'tumblr' => 'fa-tumblr',
            'google-plus' => 'fa-google-plus',
            'flickr' => 'fa-flickr',
            'linkedin' => 'fa-linkedin',
            'pinterest' => 'fa-pinterest-p',
            'slack' => 'fa-slack',
            'stumbleupon' => 'fa-stumbleupon',
            'tripadvisor' => 'fa-tripadvisor',
            'vimeo' => 'fa-vimeo',
            'youtube' => 'fa-youtube'
        ];
    }

    public function getPlatformFaviconAttribute()
    {
        return static::platformFaviconList()[$this->platform];
    }
}
