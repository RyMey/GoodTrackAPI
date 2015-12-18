<?php
/**
 * Created by PhpStorm.
 * User           : RyMey
 * Email          : rya.meyvriska@mail.ugm.ac.id
 * Linkedin       : https://id.linkedin.com/in/rymey
 * Github Account : https://github.com/RyMey
 * Date           : 15/12/2015
 * Time           : 13.51
 */

namespace Zelory\GoodTrack\Model;

use Illuminate\Database\Capsule\Manager;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    const TABLE_NAME = "artist";
    const PRIMARY_KEY="ArtistId";

    public $table = Artist::TABLE_NAME;
    public $primaryKey = Artist::PRIMARY_KEY;

    public static function getName($page)
    {
        return Manager::table(Artist::TABLE_NAME)
            ->skip(12 * ($page - 1))
            ->take(12)
            ->get([Artist::PRIMARY_KEY,"Name"]);

    }
}

?>