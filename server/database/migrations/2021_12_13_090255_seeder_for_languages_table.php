<?php

use App\Models\Language;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function PHPSTORM_META\map;

class SeederForLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $languages = [
            [
                "code" => "python",
                "name" => "Python",
                "icon" => "fab fa-python"
            ],
            [
                "code" => "js",
                "name" => "JavaScript",
                "icon" => "fab fa-js"
            ],
            [
                "code" => "php",
                "name" => "php",
                "icon" => "fab fa-php"
            ]

        ];

        foreach($languages as $languageData){
            $lang = new Language($languageData);
            $lang->save();
        };
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
