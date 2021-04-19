<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'contacted_at',
        'active'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function format()
    {
        return [
            'customer_id'   => $this->id,
            'customer_name' => $this->name,
            'created_by'    => $this->user->email,
            'last_updated'  => $this->updated_at->diffForHumans()        //25 minutes ago
        ];
    }
}
