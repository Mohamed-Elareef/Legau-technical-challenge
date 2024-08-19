<?php

namespace App\Http\Controllers;

use App\Models\CourtDecision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class DecisionController extends Controller
{
    public function show($id)
    {
        try {
            $decision = CourtDecision::findOrFail($id);
            $tags = $decision->tags;
            $court = $decision->court;

            return view('decision.decision', compact('decision', 'tags', 'court'));
        } catch (\Exception $e) {
            Log::error('Error in show method: ' . $e->getMessage());
            return response()->view('errors.500', [], 500);
        }
    }

    public function askQuestion(Request $request, $id)
    {
        try {
            $decision = CourtDecision::findOrFail($id);
            $question = $request->input('question');

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
            ])->post('https://api.openai.com/v1/chat/completions', [
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'system', 'content' => 'You are a helpful assistant.'],
                    ['role' => 'user', 'content' => "Question about court decision: $question"],
                ],
            ]);

            if ($response->successful()) {
                $answer = $response->json('choices.0.message.content');
                return view('decision.answer', compact('decision', 'question', 'answer'));
            } else {
                // Log response in case of error
                Log::error('Error from OpenAI API: ' . $response->body());
                return view('decision.answer', compact('decision', 'question'))
                    ->with('answer', 'Sorry, there was an error processing your request.');
            }
        } catch (\Exception $e) {
            // Detailed error recording
            Log::error('Error in askQuestion method: ' . $e->getMessage());
            return view('decision.answer', compact('decision', 'question'))
                ->with('answer', 'Sorry, there was an error processing your request.');
        }
    }

}
