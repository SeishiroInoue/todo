<?php

namespace App\Policies;


use App\Folder;
use App\User;

class FolderPolicy
{
    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function view(User $user, Folder $folder)
    {
        return $user->id === $folder->user_id;
    }
}
