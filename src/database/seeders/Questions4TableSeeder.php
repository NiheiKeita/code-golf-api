<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Questions4TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Question::factory()->create(
            [
                "title" => "フィボナッチ数列の素数",
                "detail" => "フィボナッチ数列のうち、素数のみを出力してください。出力は改行で区切ってください。※答えをそのままprintなどはせずに、計算して出すようにお願いします。",
                "example_code" => '$limit = 10000000000;\n$fibonacci = [0, 1];\n$primes = [];\n\nfor ($i = 2; $i < $limit; $i++) {\n    $next = $fibonacci[$i - 1] + $fibonacci[$i - 2];\n    if ($next > $limit) {\n        break;\n    }\n    $fibonacci[] = $next;\n\n    if ($next > 1) {\n        $isPrime = true;\n        for ($j = 2; $j <= sqrt($next); $j++) {\n            if ($next % $j === 0) {\n                $isPrime = false;\n                break;\n            }\n        }\n        if ($isPrime) {\n            $primes[] = $next;\n        }\n    }\n}\n\necho implode(PHP_EOL, $primes);',
                "answer" => "2\n3\n5\n13\n89\n233\n1597\n28657\n514229\n433494437\n2971215073",
            ]
        );
    }
}
