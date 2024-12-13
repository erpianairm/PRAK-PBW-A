<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use App\Enums\StoreStatus;

class StoreController extends Controller 
{
    public function list()
    {
        $stores = Store::query()
            ->latest()
            ->paginate(10);

        return view('stores.list', [
            'stores' => $stores,
        ]);
    }

    public function approve(Store $store)
    {
        $store->status = StoreStatus::ACTIVE;
        $store->save();

        return back();
    }
    public function index()
    {
        
        $stores = Store::query()
            ->where('status', StoreStatus::ACTIVE)
            ->latest()
            ->get();
        return view('stores.index', [
            'stores' => $stores,
        ]);
    }
 
    /**
     * Show the form for creating a new resource.
     *
     
     */
    public function create()
    {
        return view('stores.form', [
            'store' => new Store(),
            'page_meta' => [
                'title' => 'Create store',
                'description' => 'Create new store for yours.',
                'method' => 'post',
                'url' => route('stores.store'),
            ]
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     
     */
    public function store( StoreRequest $request)
    {
        
        
        $file = $request->file('logo');

    // Gabungkan data yang divalidasi dengan slug dan logo
    $data = array_merge(
        $request->validated(),
        [
            'logo' => $file->store('public/images/stores'),
            'slug' => Str::slug($request->input('name')), // Buat slug dari nama toko
        ]
    );

    // Simpan data toko dengan relasi ke user
    $request->user()->stores()->create($data);

    }

    /**
     * Display the specified resource.
     *
   
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     
     */
    public function edit(Store $store)
    {

        Gate::authorize('update', $store);

        return view('stores.form', [
            'store' => $store,
            'page_meta' => [
                'title' => 'Edit store',
                'description' => 'Edit store:' . $store->name,
                'method' => 'put',
                'url' => route('stores.update', $store),
            ]
        ]); 
    }

    /**
     * Update the specified resource in storage.
     *
    
     */
    public function update(StoreRequest $request, Store $store)
    {
        
        if ($request->hasFile('logo')) {
            Storage::delete($store->logo);
            $file = $request->file('logo');
        } else {
            $file = $store->logo;
        }
        
        $store->update([
            'name' => $request->name,
            'description' => $request->description,
            'logo' => $file->store('images/stores'),
        ]);

        return to_route('stores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     
     */
    public function destroy(Store $store)
    {
        //
    }
}