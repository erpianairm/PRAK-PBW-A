<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;

trait HasRoles
{
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'user_role');
    }

    public function assignRole(Role $role): Model
    {
        return $this->roles()->save($role);
    }

    public function isAdmin(): bool
    {
        return $this->hasRole('admin');
    }

    public function isPartner(): bool
    {
        return $this->hasRole('parter');
    }

    public function hasRole(string $role): bool
    {
        return $this->roles()->where('name', $role)->exists();
    }
}