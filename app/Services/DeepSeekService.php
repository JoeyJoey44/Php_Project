<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class DeepSeekService
{
    public function summarize($text)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('DEEPSEEK_API_KEY'),
            'Content-Type' => 'application/json',
        ])->timeout(180) // ⏱ Increase timeout
            ->post('https://openrouter.ai/api/v1/chat/completions', [
                'model' => 'deepseek/deepseek-r1',
                'max_tokens' => 4096,
                'top_p' => 1,
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => 'You are a helpful assistant that converts lecture transcripts into clear, easy-to-read study notes.',
                    ],
                    [
                        'role' => 'user',

                        'content' => "Convert this lecture transcript into clean, concise study notes and return the result as formatted HTML. Use:\n\n" .
                            "- `<h2>` for section titles\n" .
                            "- `<ul><li>` for bullet points\n" .
                            "- `<pre><code>` for any code blocks\n" .
                            "- Use HTML tables if needed for comparisons\n\n" .
                            "Do NOT include explanation or thinking. Just return the final HTML summary.\n\n" .
                            "Transcript:\n\n" . $text,

                    ]
                ],
            ]);

        if ($response->failed()) {
            return [
                'error' => $response->json('error.message') ?? 'Something went wrong',
                'status' => $response->status()
            ];
        }

        return $response->json('choices.0.message.content');
    }
}
