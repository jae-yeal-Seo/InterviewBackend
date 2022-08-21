<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\QuestionSet;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class QuestionController extends Controller
{
    function questionSetAdd(Request $request)
    {

        $questionSet = QuestionSet::create([
            "name" => $request->questionset,
            "sequence" => $request->sequence,
            "user_id" => Auth::user()->id,
        ]);

        Log::info($questionSet);

        return $questionSet;
    }

    function getQuestionsets($userId)
    {
        $questionsets = QuestionSet::where('user_id', $userId)->get();
        $questions = new Collection([]);
        Log::info($questionsets[0]->id);
        for ($i = 0; $i < count($questionsets); $i++) {
            $question = Question::where('question_set_id', $questionsets[$i]->id)->get();
            $sequence = QuestionSet::where('id', $questionsets[$i]->id)->get();
            $question->questionsetsequence = $sequence[0]->sequence;
            $questions = $questions->merge($question);
        }

        return [$questionsets, $questions];
    }

    function questionAdd(Request $request)
    {
        Log::info($request);
        $question = Question::create([
            "name" => $request->question,
            "sequence" => $request->questionIndex,
            "question_set_id" => $request->onequestionsetId,
        ]);

        return $question;
    }
}
