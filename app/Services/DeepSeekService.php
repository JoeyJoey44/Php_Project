<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class DeepSeekService
{
    public function summarize($text)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('DEEPSEEK_API_KEY'),
            'HTTP-Referer' => 'https://github.com/JoeyJoey44/Php_Project',
        ])->post('https://openrouter.ai/api/v1/chat/completions', [
            'model' => 'deepseek-chat',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'You are a helpful assistant that summarizes lecture transcripts clearly and concisely.',
                ],
                [
                    'role' => 'user',
                    'content' => "Summarize this lecture:\n\n" . $text,
                ]
            ],
        ]);

        if ($response->failed()) {
            return ['error' => $response->json('error.message') ?? 'Something went wrong'];
        }

        return $response->json('choices.0.message.content');
    }
}
