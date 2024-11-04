<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeCompanyJobRequest;
use App\Models\Company;
use App\Models\CompanyJob;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CompanyJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use AuthorizesRequests;

    public function index()
    {
        $user = Auth::user();

        $my_company = Company::where('employer_id', $user->id)->first();

        if ($my_company) {
            $company_jobs = CompanyJob::with(['category'])->where('company_id', $my_company->id)->paginate(10);
        } else {
            $company_jobs = collect();
        }
        return view('admin.company_jobs.index', compact('company_jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();

        $my_company = Company::where('employer_id', $user->id)->first();

        if (!$my_company) {
            return redirect()->route('admin.company.create');
        }

        $categories = Category::all();

        return view('admin.company_jobs.create', compact('categories', 'my_company'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storeCompanyJobRequest $request)
    {
        DB::transaction(function () use ($request) {
            $validated = $request->validated();
            if ($request->hasFile('thumbnail')) {
                $thumbnailPath = $request->file('thumbnail')->store('thumbnails' . date('Y/m/d'), 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }
            $validated['slug'] = Str::slug($validated['name']);
            $validated['is_open'] = true;
            $newJob = CompanyJob::create($validated);
            if (!empty($validated['responsibilities'])) {
                foreach ($validated['responsibilities'] as $responsibility) {
                    $newJob->responsibilities()->create([
                        'name' => $responsibility,
                    ]);
                }
            }
            if (!empty($validated['qualifications'])) {
                foreach ($validated['qualifications'] as $qualification) {
                    $newJob->qualifications()->create([
                        'name' => $qualification,
                    ]);
                }
            }
        });

        return redirect()->route('admin.company.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(CompanyJob $companyJob)
    {
        return view('admin.company_jobs.show', compact('companyJob'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompanyJob $companyJob)
    {
        $this->authorize('edit', $companyJob);
        return view('admin.company_jobs.edit', compact('companyJob'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CompanyJob $companyJob)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompanyJob $companyJob)
    {
        //
    }
}
