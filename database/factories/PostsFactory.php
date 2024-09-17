<?php

namespace Database\Factories;

use App\Models\Categories;
use App\Models\Posts;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Http;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\posts>
 */
class PostsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
        ];
    }
    // custom function
    function generateGeminiContent($text)
    {
        $apiKey = 'AIzaSyDX2k3wkHJjNz01ud_i3XqtEfYiHbPSIBY';
        $url = "https://generativelanguage.googleapis.com/v1/models/gemini-pro:generateContent";
        $payload = [
            "contents" => [
                [
                    "role" => "user",
                    "parts" => [
                        [
                            "text" => $text
                        ]
                    ]
                ]
            ]
        ];
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'x-goog-api-key' => $apiKey,
        ])->post($url, $payload);
        if ($response->successful()) {
            return $response->json();
        } else {
            return 'Error: ' . $response->status() . ' - ' . $response->body();
        }
    }
    public  function getTextFromResponse($responseArray)
    {
        if (isset($responseArray['candidates'][0]['content']['parts'][0]['text'])) {
            return $responseArray['candidates'][0]['content']['parts'][0]['text'];
        }
        return false;
    }
    public function prompt($text)
    {
        return "
                        $text. please breifly explain
                        this topic in simple and easy language. add a img tag with link of a image from any website on server if any image is needed. create long text as you can.  add title of the topics in h1 tags. use as a teacher tune.  also use emojies is needed to beautify the text.
                        again please define the text briefly in easy and simple language with above prompts.
                    ";
    }

    public function loadTopics()
    {
        $jsonData = File::get(database_path('factories/mysql_topics.json'));
        $data = json_decode($jsonData, true);
        $id = 0;
        $topic_id = 0;
        foreach ($data as $item) {
            $id += 1;
            echo  $id;
            foreach ($item['subtopics'] as $topic) {
                $topic_id += 1;
                echo 'topic: (';
                echo $id;
                echo ' - ';
                echo $topic_id;
                echo ') ';
                if ($topic_id <= 164) continue;
                $response = PostsFactory::generateGeminiContent(PostsFactory::prompt("This is MySQL chapter `{$item['title']}` and topic is `{$topic}`."));
                $desc = PostsFactory::getTextFromResponse($response);
                if (!$desc) {
                    $desc = 'not_exist';
                }
                $desc = trim($desc, '"');
                Posts::create([
                    'title' => $topic,
                    'body' => $desc,
                    'categories_id' => $id,
                    'default_sql' => 'null',
                    'slug' => Posts::createSlug($topic)
                ]);
            }
        }
    }
    public function loadCategories()
    {
        $jsonData = File::get(database_path('factories/mysql_topics.json'));
        $data = json_decode($jsonData, true);
        $id = 0;
        foreach ($data as $item) {
            $id += 1;
            $response = PostsFactory::generateGeminiContent("
                please define this text `{$item['title']}` briefly in 3 to 5 lines of text and also add some emojies and other things to beautify this text.
                also don't add the title just add brief. and also don't add any line escapes etc.
            ");
            $desc = PostsFactory::getTextFromResponse($response);
            if (!$desc) {
                $desc = '';
            }
            $desc = trim($desc, '"');
            Categories::create([
                'title' => $item['title'],
                'description' => $desc,
                'slug' => Categories::createUniqueSlug($item['title']),
            ]);
        }
    }

    // public function loadFromJson()
    // {
    //     // Load JSON data from the file
    //     $jsonData = File::get(database_path('factories/post_data.json'));
    //     $data = json_decode($jsonData, true);

    //     return $this->state(function (array $attributes) use ($data) {
    //         // Return data loaded from the JSON file
    //         return [
    //             'title' => $data['title'] ?? $this->faker->sentence,
    //             'content' => $data['content'] ?? $this->faker->paragraph,
    //             'categories_id' => $data['categories_id'] ?? \App\Models\Category::factory(),
    //             'active' => $data['active'] ?? 1,
    //         ];
    //     });
    // }
}
