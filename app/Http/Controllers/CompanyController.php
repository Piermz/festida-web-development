<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCompanyRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        $company = Company::with(['employer'])->where('employer_id', $user->id)->first();
        if (!$company) {
            return redirect()->route('admin.company.create');
        }
        return view('admin.company.index', compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request)
    {
        $user = Auth::user();

        $company = Company::where('employer_id', $user->id)->first();
        if($company){
            return redirect()->back()->withErrors('error', 'Failed! anda sudah memiliki company.');
        }

        DB::transaction(function () use ($request, $user) {
            $validated = $request->validated();

            if($request->hasFile('logo')) {
                $logoPath = $request->file('logo')->store( 'logos/'. date('Y/m/d'), 'public');
                $validated['logo'] = $logoPath;
            }

            $validated['slug'] = Str::slug($validated['name']);
            $company['employer_id'] = $user->id;

            $newData = Company::create($validated);
        });

        return redirect()->route('admin.company.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        //
    }
}
