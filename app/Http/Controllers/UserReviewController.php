<?php

namespace App\Http\Controllers;

use App\Models\userReview;
use Illuminate\Http\Request;

class UserReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = userReview::orderBy('created_at', 'desc')->get();
        return view('admin.review', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(userReview $userReview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(userReview $userReview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, userReview $userReview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $review = userReview::findOrFail($id);
        $review->delete();
        return redirect()->back()->with('success', 'Review deleted successfully.');
    }
}
