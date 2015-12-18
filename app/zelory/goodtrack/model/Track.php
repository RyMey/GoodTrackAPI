<?php
/**
 * Created by PhpStorm.
 * User           : RyMey
 * Email          : rya.meyvriska@mail.ugm.ac.id
 * Linkedin       : https://id.linkedin.com/in/rymey
 * Github Account : https://github.com/RyMey
 * Date           : 14/12/2015
 * Time           : 20.30
 */

namespace Zelory\GoodTrack\Model;

use Illuminate\Database\Capsule\Manager;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    const TABLE_NAME = "track";
    const PRIMARY_KEY = "TrackId";

    public $table = Track::TABLE_NAME;
    public $primaryKey = Track::PRIMARY_KEY;

    public static function getTracks($page)
    {
        return Manager::table(Track::TABLE_NAME)
            ->join(Album::TABLE_NAME, Track::TABLE_NAME . "." . Album::PRIMARY_KEY, "=", Album::TABLE_NAME . "." . Album::PRIMARY_KEY)
            ->join(Genre::TABLE_NAME, Track::TABLE_NAME . "." . Genre::PRIMARY_KEY, "=", Genre::TABLE_NAME . "." . Genre::PRIMARY_KEY)
            ->join(Artist::TABLE_NAME, Album::TABLE_NAME . "." . Artist::PRIMARY_KEY, "=", Artist::TABLE_NAME . "." . Artist::PRIMARY_KEY)
            ->orderBy(Track::TABLE_NAME . ".name")
            ->skip(12 * ($page - 1))
            ->take(12)
            ->get([Track::PRIMARY_KEY,
                Track::TABLE_NAME . ".name as song",
                Album::TABLE_NAME . ".title as album",
                Genre::TABLE_NAME . ".name as genre",
                Artist::TABLE_NAME . ".name as singer",
                "composer",
                Track::TABLE_NAME . ".unitprice as price"]);
    }

    public static function getTracksBySong($id)
    {
         return Manager::table(Track::TABLE_NAME)
             ->join(Album::TABLE_NAME, Track::TABLE_NAME . "." . Album::PRIMARY_KEY, "=", Album::TABLE_NAME . "." . Album::PRIMARY_KEY)
             ->join(Genre::TABLE_NAME, Track::TABLE_NAME . "." . Genre::PRIMARY_KEY, "=", Genre::TABLE_NAME . "." . Genre::PRIMARY_KEY)
             ->join(Artist::TABLE_NAME, Album::TABLE_NAME . "." . Artist::PRIMARY_KEY, "=", Artist::TABLE_NAME . "." . Artist::PRIMARY_KEY)
             ->where(Track::TABLE_NAME.".".Track::PRIMARY_KEY,"=",$id)
             ->orderBy(Track::PRIMARY_KEY)
             ->get([Track::PRIMARY_KEY,
                 Track::TABLE_NAME . ".name as song",
                 Album::TABLE_NAME . ".title as album",
                 Genre::TABLE_NAME . ".name as genre",
                 Artist::TABLE_NAME . ".name as singer",
                 "composer",
                 Track::TABLE_NAME . ".unitprice as price"]);
    }

    public static function getTracksByArtist($id)
    {
        return Manager::table(Track::TABLE_NAME)
            ->join(Album::TABLE_NAME, Track::TABLE_NAME . "." . Album::PRIMARY_KEY, "=", Album::TABLE_NAME . "." . Album::PRIMARY_KEY)
            ->join(Genre::TABLE_NAME, Track::TABLE_NAME . "." . Genre::PRIMARY_KEY, "=", Genre::TABLE_NAME . "." . Genre::PRIMARY_KEY)
            ->join(Artist::TABLE_NAME, Album::TABLE_NAME . "." . Artist::PRIMARY_KEY, "=", Artist::TABLE_NAME . "." . Artist::PRIMARY_KEY)
            ->where(Artist::TABLE_NAME.".".Artist::PRIMARY_KEY,"=",$id)
            ->orderBy(Track::PRIMARY_KEY)
            ->get([Track::PRIMARY_KEY,
                Track::TABLE_NAME . ".name as song",
                Album::TABLE_NAME . ".title as album",
                Genre::TABLE_NAME . ".name as genre",
                Artist::TABLE_NAME . ".name as singer",
                "composer",
                Track::TABLE_NAME . ".unitprice as price"]);
    }

    public static function getTracksByAlbum($id)
    {
        return Manager::table(Track::TABLE_NAME)
            ->join(Album::TABLE_NAME, Track::TABLE_NAME . "." . Album::PRIMARY_KEY, "=", Album::TABLE_NAME . "." . Album::PRIMARY_KEY)
            ->join(Genre::TABLE_NAME, Track::TABLE_NAME . "." . Genre::PRIMARY_KEY, "=", Genre::TABLE_NAME . "." . Genre::PRIMARY_KEY)
            ->join(Artist::TABLE_NAME, Album::TABLE_NAME . "." . Artist::PRIMARY_KEY, "=", Artist::TABLE_NAME . "." . Artist::PRIMARY_KEY)
            ->where(Album::TABLE_NAME.".".Album::PRIMARY_KEY,"=",$id)
            ->orderBy(Track::PRIMARY_KEY)
            ->get([Track::PRIMARY_KEY,
                Track::TABLE_NAME . ".name as song",
                Album::TABLE_NAME . ".title as album",
                Genre::TABLE_NAME . ".name as genre",
                Artist::TABLE_NAME . ".name as singer",
                "composer",
                Track::TABLE_NAME . ".unitprice as price"]);
    }

    public static function getTracksByGenre($id)
    {
        return Manager::table(Track::TABLE_NAME)
            ->join(Album::TABLE_NAME, Track::TABLE_NAME . "." . Album::PRIMARY_KEY, "=", Album::TABLE_NAME . "." . Album::PRIMARY_KEY)
            ->join(Genre::TABLE_NAME, Track::TABLE_NAME . "." . Genre::PRIMARY_KEY, "=", Genre::TABLE_NAME . "." . Genre::PRIMARY_KEY)
            ->join(Artist::TABLE_NAME, Album::TABLE_NAME . "." . Artist::PRIMARY_KEY, "=", Artist::TABLE_NAME . "." . Artist::PRIMARY_KEY)
            ->where(Genre::TABLE_NAME.".".Genre::PRIMARY_KEY,"=",$id)
            ->orderBy(Track::PRIMARY_KEY)
            ->get([Track::PRIMARY_KEY,
                Track::TABLE_NAME . ".name as song",
                Album::TABLE_NAME . ".title as album",
                Genre::TABLE_NAME . ".name as genre",
                Artist::TABLE_NAME . ".name as singer",
                "composer",
                Track::TABLE_NAME . ".unitprice as price"]);
    }

    public static function getTracksByPlaylist($id)
    {
        return Manager::table(Track::TABLE_NAME)
            ->join(Album::TABLE_NAME, Track::TABLE_NAME . "." . Album::PRIMARY_KEY, "=", Album::TABLE_NAME . "." . Album::PRIMARY_KEY)
            ->join(PlaylistTrack::TABLE_NAME, Track::TABLE_NAME . "." . Track::PRIMARY_KEY, "=", PlaylistTrack::TABLE_NAME . "." . Track::PRIMARY_KEY)
            ->join(Artist::TABLE_NAME, Album::TABLE_NAME . "." . Artist::PRIMARY_KEY, "=", Artist::TABLE_NAME . "." . Artist::PRIMARY_KEY)
            ->join(Playlist::TABLE_NAME, Playlist::TABLE_NAME . "." . Playlist::PRIMARY_KEY, "=", PlaylistTrack::TABLE_NAME . "." . Playlist::PRIMARY_KEY)
            ->where(Playlist::TABLE_NAME.".".Playlist::PRIMARY_KEY,"=",$id)
            ->orderBy(Track::TABLE_NAME.".".Track::PRIMARY_KEY)
            ->get([Track::TABLE_NAME.".".Track::PRIMARY_KEY,
                Playlist::TABLE_NAME . ".name as playlist",
                Track::TABLE_NAME . ".name as song",
                Artist::TABLE_NAME . ".name as singer",
                "composer"]);
    }
}

?>