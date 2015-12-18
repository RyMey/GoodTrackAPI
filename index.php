<?php
/**
 * Created by PhpStorm.
 * User           : RyMey
 * Email          : rya.meyvriska@mail.ugm.ac.id
 * Linkedin       : https://id.linkedin.com/in/rymey
 * Github Account : https://github.com/RyMey
 * Date           : 14/12/2015
 * Time           : 19.55
 */
require "vendor/autoload.php";
require "app/zelory/goodtrack/Database.php";

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Container;
use Slim\Handlers\Strategies\RequestResponseArgs;
use Zelory\GoodTrack\Model\Album;
use Zelory\GoodTrack\Model\Artist;
use Zelory\GoodTrack\Model\Genre;
use Zelory\GoodTrack\Model\Playlist;
use Zelory\GoodTrack\Model\Track;
use Zelory\GoodTrack\Tool\ResultWrapper;

$container = new Container();
$container['foundHandler'] = function ()
{
    return new RequestResponseArgs();
};

$slim = new Slim\App($container);
$slim->get("/", function (ServerRequestInterface $req, ResponseInterface $res)
{
    $res->getBody()->write('<script type="text/javascript"> url = window.location.href + "doc"; window.location = url;</script>');
    return $res->withStatus(200)->withHeader('Content-Type','text/html');
});

$slim->get("/tracks/{page}", function (ServerRequestInterface $req, ResponseInterface $res, $page)
{
    try
    {
        return ResultWrapper::getResult(Track::getTracks($page), $res);
    } catch (Exception $e)
    {
        return ResultWrapper::getError($e->getMessage(), $res);
    }
});

$slim->get("/tracks-by-song/{id}", function (ServerRequestInterface $req, ResponseInterface $res, $id)
{
    try
    {
        return ResultWrapper::getResult(Track::getTracksBySong($id), $res);
    } catch (Exception $e)
    {
        return ResultWrapper::getError($e->getMessage(), $res);
    }
});

$slim->get("/tracks-by-artist/{id}", function (ServerRequestInterface $req, ResponseInterface $res, $id)
{
    try
    {
        return ResultWrapper::getResult(Track::getTracksByArtist($id), $res);
    } catch (Exception $e)
    {
        return ResultWrapper::getError($e->getMessage(), $res);
    }
});

$slim->get("/tracks-by-album/{id}", function (ServerRequestInterface $req, ResponseInterface $res, $id)
{
    try
    {
        return ResultWrapper::getResult(Track::getTracksByAlbum($id), $res);
    } catch (Exception $e)
    {
        return ResultWrapper::getError($e->getMessage(), $res);
    }
});

$slim->get("/tracks-by-genre/{id}", function (ServerRequestInterface $req, ResponseInterface $res, $id)
{
    try
    {
        return ResultWrapper::getResult(Track::getTracksByGenre($id), $res);
    } catch (Exception $e)
    {
        return ResultWrapper::getError($e->getMessage(), $res);
    }
});

$slim->get("/tracks-by-playlist/{id}", function (ServerRequestInterface $req, ResponseInterface $res, $id)
{
    try
    {
        return ResultWrapper::getResult(Track::getTracksByPlaylist($id), $res);
    } catch (Exception $e)
    {
        return ResultWrapper::getError($e->getMessage(), $res);
    }
});

$slim->get("/artist/{page}", function (ServerRequestInterface $req, ResponseInterface $res, $page)
{
    try
    {
        return ResultWrapper::getResult(Artist::getName($page), $res);
    } catch (Exception $e)
    {
        return ResultWrapper::getError($e->getMessage(), $res);
    }
});

$slim->get("/album/{page}", function (ServerRequestInterface $req, ResponseInterface $res, $page)
{
    try
    {
        return ResultWrapper::getResult(Album::getTitle($page), $res);
    } catch (Exception $e)
    {
        return ResultWrapper::getError($e->getMessage(), $res);
    }
});

$slim->get("/genre/{page}", function (ServerRequestInterface $req, ResponseInterface $res, $page)
{
    try
    {
        return ResultWrapper::getResult(Genre::getName($page), $res);
    } catch (Exception $e)
    {
        return ResultWrapper::getError($e->getMessage(), $res);
    }
});

$slim->get("/playlist/{page}", function (ServerRequestInterface $req, ResponseInterface $res, $page)
{
    try
    {
        return ResultWrapper::getResult(Playlist::getName($page), $res);
    } catch (Exception $e)
    {
        return ResultWrapper::getError($e->getMessage(), $res);
    }
});

$slim->run();

?>