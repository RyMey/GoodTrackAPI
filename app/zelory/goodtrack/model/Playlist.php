<?php
/**
 * Created by PhpStorm.
 * User           : RyMey
 * Email          : rya.meyvriska@mail.ugm.ac.id
 * Linkedin       : https://id.linkedin.com/in/rymey
 * Github Account : https://github.com/RyMey
 * Date           : 15/12/2015
 * Time           : 14.00
 */


namespace Zelory\GoodTrack\Model;

use Illuminate\Database\Capsule\Manager;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    const TABLE_NAME = "playlist";
    const PRIMARY_KEY="PlaylistId";

    public $table = Playlist::TABLE_NAME;
    public $primaryKey = Playlist::PRIMARY_KEY;

    public static function getName($page)
    {
        return Manager::table(Playlist::TABLE_NAME)
            ->skip(12 * ($page - 1))
            ->take(12)
            ->get([Playlist::PRIMARY_KEY,"Name"]);

    }
}

?>