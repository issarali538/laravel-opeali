<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PDF;

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
           'model' => 'gpt-4o-mini',
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
        
        // Save the prompt and logo URL to the database
        $chatData = Chat::create([
            'prompt' => $message,
            'logo' => $logoUrl,
        ]);

        return redirect()->back()->with([
            'message' => $message,
            'logo_url' => $logoUrl,
            'promptId' => $chatData->id,
        ]);
    }

    public function pdfGenerator(string $promptId)
    {

        
        // $promptId = $request->input('promptId');
        $chat = Chat::find($promptId);
        if (!$chat) {
            return response()->json(['error' => 'Chat not found'], 404);
        }

        $data = [
            'content' => $chat->prompt,
        ];

        // Load the view and pass data
        $pdf = PDF::loadView('pdf.pdf-view', $data);
        return $pdf->download('invoice.pdf');
    }
}
