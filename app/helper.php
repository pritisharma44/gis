<?php

use App\Models\PermissionAssignUser;
use App\Models\Permission;

function NavBar()
{
    $data = PermissionAssignUser::where('user_id', Auth('admin')->id())->with('Permission')->orderBy('permission_id', 'asc')->get()->toArray();
    return $data;
}

function checkPermission($key)
{
    $id = Permission::where('key', $key)->value('id');
    if ($id) {
        $data = PermissionAssignUser::where(['user_id' => Auth('admin')->id(), 'permission_id' => $id])->value('actions');
        return $data;
    }
}
function UplaodImages($file, $folder_name, $type = null)
{
    if ($file) {
        $path = public_path('upload/' . $folder_name);
        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
        }
        $data['document'] = substr(uniqid(1), -4) . time() . '.' . $file->getClientOriginalExtension();
        $file->move($path, $data['document']);
        if ($type) {
            return array('name' => $data['document'], 'type' => $file->getClientOriginalExtension());
        }
        return $data['document'];
    }
}

?>

