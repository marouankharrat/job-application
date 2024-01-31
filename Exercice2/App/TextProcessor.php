<?php

namespace App;

class TextProcessor
{
    public function processText(string $text, int $multiplier): array
    {
        $reversedChars = $this->reverseAndSplitText($text);
        $colors = ["green", "blau", "red"];
        $result = [];

        foreach ($colors as $color) {
            $multipliedText = implode('', array_map(function ($char) use ($multiplier) {
                return str_repeat($char, $multiplier);
            }, $reversedChars));

            $suffix = $color === "red" ? "-$color" : "-$color-> $color";
            $result[$color] = $multipliedText . $suffix;
        }

        return $result;
    }

    private function reverseAndSplitText(string $text): array
    {
        $reversedChars = str_split(strrev($text));
        return array_reverse($reversedChars);
    }
}