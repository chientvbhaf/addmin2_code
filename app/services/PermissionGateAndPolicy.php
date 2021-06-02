<?php

namespace App\services;

use Illuminate\Support\Facades\Gate;

class PermissionGateAndPolicy
{

    public function SetGatePolicy()
    {
        $this->DefineGateProduct();
        $this->DefineGateCategory();
    }
    public function DefineGateCategory()
    {
        Gate::define('category_list', 'App\Policies\CategoryPostPolicy@view');
        /*         Gate::define('category_add', 'App\Policies\CategoryPostPolicy@create');
                Gate::define('category_update', 'App\Policies\CategoryPostPolicy@update');
                Gate::define('category_delete', 'App\Policies\CategoryPostPolicy@delete'); */
    }
    public function DefineGateProduct()
    {
/*         Gate::define('category_list', 'App\Policies\CategoryPostPolicy@view');
        Gate::define('category_add', 'App\Policies\CategoryPostPolicy@create'); */
        Gate::define('product_update', 'App\Policies\ProductPolicy@update');
/*         Gate::define('category_delete', 'App\Policies\CategoryPostPolicy@delete'); */
    }
}
