<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Store;
// use Illuminate\Auth\Access\HandlesAuthorization;
// use Illuminate\Auth\Access\Response;

class StorePolicy
{
    public function update(User $user, Store $store): bool 
    {
        return $user->id == $store->user_id;
    }

    public function destroy(User $user, Store $store): bool 
    {
    return $this->update($user, $store);
    }

    // public function update(User $user, Store $store): Response
    // {
    // return $user->id == $store->user_id ? Response::allow() : Response::denyAsNotFound();
    // }

   
}
