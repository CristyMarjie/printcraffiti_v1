<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    
    public function index(){
        $reviews = Review::all();
        return view('pages.tables.review_table', ['reviews' => $reviews]);
    }
    public function topReviews(){
        $reviews = Review::all();
        return view('home', ['reviews' => $reviews]);
    }
    public function allReviews(){
        $reviews = Review::all();
        return view('home', ['reviews' => $reviews]);
    }
    public function reviewDetails($reviewId)
    {
        return Review::find($reviewId);
    }
    public function store(Request $request)
    {
        // toggling status
        if ($request->method == 'toggleStatus') {
            $this->toggleStatus($request, $request->id);
        }
        // complete all tasks
        if ($request->method == 'completeAllTasks') {
            $this->completeAllTasks($request, $request->id);
        }
        // delete
        if ($request->method == 'delete') {
            $this->destroy($request->id);
        }
        // deleteAll
        if ($request->method == 'deleteAll') {
            $this->destroyAll();
        }
        // add a new review
        if ($request->method == 'addReview')
        {
            $this->addReview($request);
        }

        return redirect()->route('reviews.index');
    }
    
    public function addReview(Request $request)
    {
        $review = new Review;

        $review->customer_id = $request->customer_id;
        $review->order_id = $request->order_id;
        $review->rate = $request->rate;
        $review->review = $request->review;
        $review->reply = $request->reply;
        $review->status = $request->status;

        $review->save();

        return;

    }

}
