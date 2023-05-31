<?php
/**
 * AdMedia
 * User: Fábio Menezes
 * Date: 30/05/2023
 * Description:
 */
try {
    $json_string = file_get_contents('php://input');
    $resource = json_decode($json_string, false, 512, JSON_THROW_ON_ERROR);
    file_put_contents('hook/' . $resource->resource->id . '.json', $json_string);
} catch (JsonException $e) {

}
