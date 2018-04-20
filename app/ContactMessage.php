<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $table = 'contact_messages';
    protected $fillable = ['name', 'email', 'phone', 'subject', 'message', 'status'];

    public static function statusList()
    {
        return [
            'waiting-confirmation' => 'Waiting Confirmation',
            'confirmed' => 'Confirmed',
        ];
    }

    public static function statusLabel()
    {
        return [
            'waiting-confirmation' => 'label-warning',
            'confirmed' => 'label-success'
        ];
    }

    public function getHumanStatusAttribute()
    {
        return static::statusList()[$this->status];
    }

    public function getLabelStatusAttribute()
    {
        return static::statusLabel()[$this->status];
    }

    public static function allowedStatus()
    {
        return array_keys(static::statusList());
    }
}
