<?php

use App\Models\Services;
use App\Models\Client;

if (!function_exists('getClients')) {
    function getClients() {
        return Client::orderBy('id', 'ASC')->get();
    }
}

if (!function_exists('getServices')) {
    function getServices() {
        return Services::orderBy('id', 'ASC')->get();
    }
}
if (!function_exists('formatTitleCase')) {
    function formatTitleCase($text)
    {
        return ucwords(strtolower($text));
    }
}
