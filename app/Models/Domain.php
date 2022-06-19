<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;

    protected $fillable = ['domain_id', 'name', 'description', 'url', 'server_name', 'organization_name', 'email_organization', 'phone_organization', 'category_id', 'expiration_date'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
