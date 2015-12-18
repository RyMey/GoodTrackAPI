<?php
namespace Zelory\GoodTrack\Tool;

use Psr\Http\Message\ResponseInterface;

/**
 * Created by PhpStorm.
 * User           : RyMey
 * Email          : rya.meyvriska@mail.ugm.ac.id
 * Linkedin       : https://id.linkedin.com/in/rymey
 * Github Account : https://github.com/RyMey
 * Date           : 17/12/2015
 * Time           : 17.45
 */
class ResultWrapper
{
    public static function getResult($item, ResponseInterface $response)
    {
        $result = json_encode(array('status' => 'success', 'result' => $item),
            JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
        $response->getBody()->write($result);
        return $response->withStatus(200)->withHeader('Content-Type', 'application/json');
    }

    public static function getError($item, ResponseInterface $response)
    {
        $result = json_encode(array('status' => 'error', 'message' => $item),
            JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
        $response->getBody()->write($result);
        return $response->withStatus(404)->withHeader('Content-Type', 'application/json');
    }
}

?>