<?php

namespace App\Services;

use TCG\Voyager\Models\Setting;

class ShortCodeService
{
    static public function doShortcode($slug, $data = []) {

        $slugs = ['title', 'h1', 'description', 'subtitle', 'text',];
        $keys = [];
        foreach ($slugs as $key) {$keys[] = "$slug.$key";}

        $settings = Setting::whereIn('key', $keys)->get();

        $result = [];
        foreach ($settings as $setting) {
            $name = str_replace("$slug.", '', $setting->key);
            $result[$name] = self::replece($setting->value, $data);
        }

        return $result;
    }
    static private function replece($text, $data) {
        foreach ($data as $key => $value) {
            $text = strtr($text, ["[$key]"=> $value,]);
        }

        return $text;
    }
}
