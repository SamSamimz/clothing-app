<?php

namespace App\Http\Controllers;

use App\Http\Requests\PartnerPost;
use App\Models\Partner;
use Illuminate\Http\Request;

use function PHPUnit\Framework\fileExists;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partners = Partner::all();
        return view('admin.partners.index',compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.partners.create_partner');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PartnerPost $request)
    {
        $validated = $request->validated();
        if($request->hasFile('logo')){
            $logo = $request->file('logo');
            $logoName = "logo_".time().'_.'.$logo->getClientOriginalExtension();
            $validated['logo'] = $logo->storeAs('logos', $logoName, 'public');
            Partner::create($validated);
            return to_route('partners.index');
        }else {
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Partner $partner)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partner $partner)
    {
        return view('admin.partners.edit_partners',compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Partner $partner)
    {
        $validated = $request->validate([
            'name' => 'required',
            'url' => 'required|active_url',
            'logo' => 'nullable|image|mimes:png,jpg'
        ]);
        if($request->hasFile('image') && fileExists(public_path('storage/'.$partner->logo))) {
            unlink(public_path('storage/'.$partner->logo));
            $logo = $request->file('logo');
            $logoName = "logo_".time().'_.'.$logo->getClientOriginalExtension();
            $validated['logo'] = $logo->storeAs('logos', $logoName, 'public');
            $partner->update($validated);
            return to_route('partners.index');
        }else {
            $partner->update($validated);
            return to_route('partners.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partner $partner)
    {
        if($partner->logo) {
            if(file_exists(public_path('storage/'.$partner->logo))) {
                unlink(public_path('storage/'.$partner->logo));
            }
        }
        $partner->delete();
        return back();
    }
}
