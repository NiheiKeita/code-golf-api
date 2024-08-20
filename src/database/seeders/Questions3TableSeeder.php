<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Questions3TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Question::factory()->create(
            [
                "title" => "アルファベット横向きピラミッド",
                "detail" => "アルファベットが横を向いているのように出力されるコードを実装してください。最後は改行をしてください。",
                "example_code" => '$lines = [\n    "a",\n    "bc",\n    "def",\n    "ghij",\n    "klmno",\n    "pqrs",\n    "tuv",\n    "wx",\n    "y"\n];\nforeach ($lines as $line) {\n    echo $line . PHP_EOL;\n}',
                "answer" => "a\nbc\ndef\nghij\nklmno\npqrs\ntuv\nwx\ny\n",
            ]
        );
    }
}
