<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Permission;

class PermissionAssignUser extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function Permission()
    {
        return $this->belongsTo(Permission::class,'permission_id','id');
    }
}
