<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return Role::all();
    }

    public function show(Role $role)
    {
        return $role;
    }

    public function store()
    {
        $dataRole = [];
        return Role::create($dataRole);
    }

    public function update(Role $role)
    {
            $dataRole = [];
            $role->update($dataRole);
            return $role;
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return response(['message' => 'deleted'], 200);
    }
}
