<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{

    public function viewAny(User $user): bool
    {
        //
    }

    public function view(User $user, Post $post): bool
    {
        //
    }

    public function create(User $user): bool
    {
        return $user->role_id == 1 || $user->role_id == 2;
    }

    public function update(User $user, Post $post): bool
    {
        return $user->role_id == 1 || $user->role_id == 2;
    }

    public function delete(User $user, Post $post): bool
    {
        return $user->role_id == 1; 
    }

    public function restore(User $user, Post $post): bool
    {
        //
    }

    public function forceDelete(User $user, Post $post): bool
    {
        //
    }
}
