<?php
/**
 * Created by PhpStorm.
 * User           : RyMey
 * Email          : rya.meyvriska@mail.ugm.ac.id
 * Linkedin       : https://id.linkedin.com/in/rymey
 * Github Account : https://github.com/RyMey
 * Date           : 17/12/2015
 * Time           : 18.32
 */

namespace Zelory\GoodTrack\Model;

use Illuminate\Database\Eloquent\Model;

class PlaylistTrack extends Model
{
    const TABLE_NAME = "playlisttrack";

    public $table = Playlist::TABLE_NAME;
}

?>