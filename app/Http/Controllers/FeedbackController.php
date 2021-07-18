<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\feedback;

class FeedbackController extends Controller
{
  public function feedbackinadmin()
  {
    $Feedbacks=Feedback::all();
    return view('admin.Feedback')->with('Feedbacks',$Feedbacks);
  }
    
    public function store(Request $request)
      {
        $Feedbacks = new Feedback;
        $Feedbacks->description =$request->input('description');
        $Feedbacks->email =$request->input('email');
        $Feedbacks->feedback =$request->input('feedback');
        $Feedbacks->save();
        return redirect('/')->with('status','Thank you for your feedback');
      }
     
    }