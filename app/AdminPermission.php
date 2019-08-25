<?php

namespace App;

class AdminPermission extends Model
{
    protected $table = 'admin_permissions';

    //权限属于那些角色
    public function roles()
    {
        return $this->belongsToMany(AdminRole::calss,'admin_permission_roel','permission_id','role_id')->withPivot(['permission_id','role_id']);
    }
}
