<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFeedbackRequest;
use App\Http\Requests\UpdateFeedbackRequest;
use App\Models\Feedback;
use App\Models\FeedbackQuestion;
use App\Models\Question;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia()->render('Feedback/Index')
            ->with('feedbacks', Feedback::with('user')->withCount('questions')->paginate(15));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia()->render('Feedback/Create')
            ->with('questions', Question::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFeedbackRequest $request)
    {
        $feedback = $request->user()->feedbacks()->create();

        foreach ($request->get('questions') as $question) {
            $feedbackQuestion = FeedbackQuestion::create([
                'feedback_id' => $feedback->id,
                'question_id' => $question['id'],
                'value' => $question['value'],
            ]);
        }

        return redirect()->route('feedback.index')->with('success', 'Thanks, you created a new feedback!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Feedback $feedback)
    {
        return inertia()->render('Feedback/Show')
            ->with('feedback', $feedback->loadMissing('user', 'questions'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feedback $feedback)
    {
        $feedback->delete();

        return redirect()->back()->with('success', 'You deleted the selected feedback');
    }
}
