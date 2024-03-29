<?php

namespace App\Policies;

use App\User;
use App\model\category;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any categories.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the category.
     *
     * @param  \App\User  $user
     * @param  \App\category  $category
     * @return mixed
     */
    public function view(User $user)
    {
       
        return $user->CheckPermissionAccess('categories_list');
    }

    /**
     * Determine whether the user can create categories.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        
    }

    /**
     * Determine whether the user can update the category.
     *
     * @param  \App\User  $user
     * @param  \App\category  $category
     * @return mixed
     */
    public function update(User $user, category $category)
    {
        //
    }

    /**
     * Determine whether the user can delete the category.
     *
     * @param  \App\User  $user
     * @param  \App\category  $category
     * @return mixed
     */
    public function delete(User $user, category $category)
    {
        //
    }

    /**
     * Determine whether the user can restore the category.
     *
     * @param  \App\User  $user
     * @param  \App\category  $category
     * @return mixed
     */
    public function restore(User $user, category $category)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the category.
     *
     * @param  \App\User  $user
     * @param  \App\category  $category
     * @return mixed
     */
    public function forceDelete(User $user, category $category)
    {
        //
    }
}
