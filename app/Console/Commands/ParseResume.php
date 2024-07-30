<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use OpenAI;

class ParseResume extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:resume {text}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse resume text using OpenAI GPT-3';


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $text = $this->argument('text');

        $result = $this->callOpenAI($text);

        $this->info("Parsed Resume Data:\n$result");
    }
    private function callOpenAI($text)
    {
        OpenAI\OpenAI::configure([
            'key' => 'YOUR_API_KEY',
            'timeout' => 5, // Set your desired timeout
        ]);

        $prompt = $this->buildPrompt($text);

        $response = OpenAI\Completion::create([
            'model' => 'text-davinci-003',
            'prompt' => $prompt,
            'temperature' => 0.7,
            'max_tokens' => 500,
        ]);

        return $response->choices[0]->text ?? 'No data found.';
    }
}
