<?php
/**
 * Created by PhpStorm.
 * User           : RyMey
 * Email          : rya.meyvriska@mail.ugm.ac.id
 * Linkedin       : https://id.linkedin.com/in/rymey
 * Github Account : https://github.com/RyMey
 * Date           : 15/12/2015
 * Time           : 13.55
 */

namespace Zelory\GoodTrack\Model;

use Illuminate\Database\Capsule\Manager;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    const TABLE_NAME = "album";
    const PRIMARY_KEY="AlbumId";


    public $table = Album::TABLE_NAME;
    public $primaryKey = Album::PRIMARY_KEY;


    public static function getTitle($page)
    {
        return Manager::table(Album::TABLE_NAME)
            ->skip(12 * ($page - 1))
            ->take(12)
            ->get([Album::PRIMARY_KEY,"Title"]);

    }
}

?>