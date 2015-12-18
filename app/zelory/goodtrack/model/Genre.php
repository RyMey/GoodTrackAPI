<?php
/**
 * Created by PhpStorm.
 * User           : RyMey
 * Email          : rya.meyvriska@mail.ugm.ac.id
 * Linkedin       : https://id.linkedin.com/in/rymey
 * Github Account : https://github.com/RyMey
 * Date           : 15/12/2015
 * Time           : 13.57
 */


namespace Zelory\GoodTrack\Model;

use Illuminate\Database\Capsule\Manager;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    const TABLE_NAME = "genre";
    const PRIMARY_KEY="GenreId";

    public $table = Genre::TABLE_NAME;
    public $primaryKey = Genre::PRIMARY_KEY;

    public static function getName($page)
    {
        return Manager::table(Genre::TABLE_NAME)
            ->skip(12 * ($page - 1))
            ->take(12)
            ->get([Genre::PRIMARY_KEY,"name"]);

    }
}

?>