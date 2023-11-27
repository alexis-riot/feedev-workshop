<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Models\Question;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia()->render('Question/Index')
            ->with('questions', Question::paginate(15));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia()->render('Question/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuestionRequest $request)
    {
        $question = Question::create($request->only('title', 'description'));

        return redirect()->route('question.index')->with('success', 'Your question has been created!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        return inertia()->render('Question/Edit')
            ->with('question', $question);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuestionRequest $request, Question $question)
    {
        $question->update($request->only('title', 'description'));

        return redirect()->back()->with('success', 'Your question has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        $question->delete();

        return redirect()->back()->with('success', 'Your question has been deleted');
    }
}
