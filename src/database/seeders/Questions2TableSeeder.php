<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Questions2TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Question::factory()->create(
            [
                "title" => "NabeAtsu問題",
                "detail" => "一昔前に一斉を風靡した芸人「世界のナベアツ」のネタを実装してください。 1から40までの数字について、その数が3の倍数もしくは3を含む数字なら日本語で、それ以外ならその数そのものを出力してください。それぞれの出力は改行で区切ってください。",
                "example_code" => '$japaneseNumbers = [\n        1 => "いち",\n        2 => "に",\n        3 => "さん",\n        4 => "し",\n        5 => "ご",\n        6 => "ろく",\n        7 => "しち",\n        8 => "はち",\n        9 => "きゅう",\n        10 => "じゅう",\n        11 => "じゅういち",\n        12 => "じゅうに",\n        13 => "じゅうさん",\n        14 => "じゅうし",\n        15 => "じゅうご",\n        16 => "じゅうろく",\n        17 => "じゅうしち",\n        18 => "じゅうはち",\n        19 => "じゅうきゅう",\n        20 => "にじゅう",\n        21 => "にじゅういち",\n        22 => "にじゅうに",\n        23 => "にじゅうさん",\n        24 => "にじゅうし",\n        25 => "にじゅうご",\n        26 => "にじゅうろく",\n        27 => "にじゅうしち",\n        28 => "にじゅうはち",\n        29 => "にじゅうきゅう",\n        30 => "さんじゅう",\n        31 => "さんじゅういち",\n        32 => "さんじゅうに",\n        33 => "さんじゅうさん",\n        34 => "さんじゅうし",\n        35 => "さんじゅうご",\n        36 => "さんじゅうろく",\n        37 => "さんじゅうしち",\n        38 => "さんじゅうはち",\n        39 => "さんじゅうきゅう",\n        40 => "よんじゅう",\n];\nfor ($i = 1; $i <= 40; $i++) {\n    if ($i % 3 == 0 || strpos((string)$i, "3") !== false) {\n        echo ($japaneseNumbers[$i] ?? $i) , PHP_EOL;\n    } else {\n        echo ($i) , PHP_EOL;\n    }\n}',
                "answer" => "1\n2\nさん\n4\n5\nろく\n7\n8\nきゅう\n10\n11\nじゅうに\nじゅうさん\n14\nじゅうご\n16\n17\nじゅうはち\n19\n20\nにじゅういち\n22\nにじゅうさん\nにじゅうし\n25\n26\nにじゅうしち\n28\n29\nさんじゅう\nさんじゅういち\nさんじゅうに\nさんじゅうさん\nさんじゅうし\nさんじゅうご\nさんじゅうろく\nさんじゅうしち\nさんじゅうはち\nさんじゅうきゅう\n40\n",
            ]
        );
    }
}
