<?php

namespace App\Helpers;

class Helper {
    public static function readJsonFile($filePath)
    {
        $jsonContent = file_get_contents($filePath);
        $data = json_decode($jsonContent, true);

        if (json_last_error() === JSON_ERROR_NONE) {
            return $data;
        } else {
            throw new \Exception('Error decoding JSON: ' . json_last_error_msg());
        }
    }
}