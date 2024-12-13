<?php

namespace App\Observers;

use App\Models\Store;
use App\Enums\StoreStatus;

class StoreObserver
{
    public function creating(Store $store): void
    {
        $store->slug = str()->slug($store->name);

        $store->status = request()->user()->isAdmin() || request()->user()->isPartner() ? StoreStatus::ACTIVE : StoreStatus::PENDING;
    }

   
}
