<?php

namespace App;

class AdminRole extends Model
{
    protected $table = 'admin_roles';

    //当前角色拥有的权限
    public function permissions()
    {
        return $this->belongsToMany(AdminPermission::class,'admin_permission_role','role_id','permission_id')->withPivot(['permission_id','role_id']);

    }

    //给角色赋予权限
    public function grantPermission($permission)
    {
        return $this->permissions()->save($permission);
    }

    //取消赋予的权限
    public function deletePermission($permission)
    {
        return $this->permissions()->detach($permission);
    }

    //判断角色是否拥有权限
    public function hasPermission($permission)
    {
        return $this->permissions->contains($permission);
    }
}
