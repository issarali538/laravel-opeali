<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatController extends Controller
{
    public function chat(Request $request)
    {
        $request->validate([
            'prompt' => 'required|string|max:255',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $apiKey = env('OPENAI_KEY');
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey,
            "Content-Type" => "application/json",
        ])->post('https://api.openai.com/v1/chat/completions', [
           'model' => 'gpt-4o',
            'messages' => [
                ['role' => 'user', 'content' => $request->input('prompt')],
            ],
            'temperature' => 0.7,
            'max_tokens' => 150,
        ]);

        if ($response->failed()) {
            return response()->json(['error' => 'Failed to connect to OpenAI API'], 500);
        }

        $logoPath = $request->file('logo')->store('logos', 'public');
        $logoUrl = asset('storage/' . $logoPath);

        $responseData = $response->json();
        $message = $responseData['choices'][0]['message']['content'] ?? 'No response from OpenAI';
        return view('prompt-view',["message" => $message, "logo" => $logoUrl]);
    }
}
