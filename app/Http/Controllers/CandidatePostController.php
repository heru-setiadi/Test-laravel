<?php

namespace App\Http\Controllers;

use App\Models\candidate;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class CandidatePostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            //return candidate::all();
        return view('candidate.posts.index', [
           'lists' => candidate::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('candidate.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData= $request->validate([
            'name' => 'required|max:255',
            'education' => 'required|max:255',
            'birthday' => 'required',
            'experience' => 'required|max:255',
            'last_position' => 'required|max:255',
            'applied_position' => 'required|max:255',
            'skills' => 'required',
            'email' => 'required|max:255',
            'phone' => 'required|max:255',
            'resume' => 'mimes:pdf'
        ]);

        candidate::create($validatedData);

        return redirect('candidate/candidates')->with('success', 'New Candidated has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(candidate $candidate)
    {
        return view('candidate.posts.show', [
            'candidate' => $candidate,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(candidate $candidate)
    {
        return view('candidate.posts.edit', [
            'candidate' => $candidate,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, candidate $candidate)
    {
        $rules=[
            'name' => 'required|max:255',
            'education' => 'required|max:255',
            'birthday' => 'required',
            'experience' => 'required|max:255',
            'last_position' => 'required|max:255',
            'applied_position' => 'required|max:255',
            'skills' => 'required',
            'email' => 'required|max:255',
            'phone' => 'required|max:255',
            'resume' => 'required|max:255'
        ];

        $validatedData=$request->validate($rules);

        candidate::where('id', $candidate->id)->update($validatedData);
        return redirect('candidate/candidates')->with('success', 'Candidated has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(candidate $candidate)
    {
        candidate::destroy($candidate->id);
        return redirect('candidate/candidates')->with('success', 'Candidated has been deleted');
    }


    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(candidate::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
