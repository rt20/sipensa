<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorizationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewData()
    {
        $this->authorize('view data');

        return 'view data';
    }

    public function createData()
    {
        $this->authorize('create data');

        return 'create data';
    }

    public function editData()
    {
        $this->authorize('edit data');

        return 'edit data';
    }

    public function updateData()
    {
        $this->authorize('update data');

        return 'update data';
    }

    public function deleteData()
    {
        $this->authorize('delete data');

        return 'delete data';
    }
}
