# Exercise 2: PHP code refactoring

Checkout following code - and refactor it. You can add new functions or classes or restructure / rename everything completely different - only the logic / result should remain the same:

```php
<?php

namespace Some\Folder\Strucutre;

class BadCode
{
    public function processText($text, int $Multiplier) {
        $input1 = $text;

        $tmp_str_splitted = $this->createReversedArraySplit($text);

        $texts = [];
        $farben = ["green", 'blau', 'red'];
        $assignment = array();
        $tmpText = "";
        $Multiplier = $Multiplier + 1;
        foreach ($tmp_str_splitted as $char) {
            $i = 1;
            while ($i < $Multiplier) {
                $tmpText =  $tmpText . $char;
                $i = $i + 1;
            }

            foreach ($farben as $color) {
                if ($color == "red") {
                    $tmpTExtWithSuffixAtEnd = $tmpText . '-red';
                    $assignment["red"] = $tmpTExtWithSuffixAtEnd;
                    $assignment['red'] = $tmpTExtWithSuffixAtEnd;

                    break;
                }
                else {
                    continue;
                }
            }

            foreach ($farben as $color) {
                if ($color == "blau") {
                    $assignment["blau"] = $tmpText . '-blau';

                    break;
                }
                else {
                    continue;

                    $assignment["blau"] = $tmpText . '-blau';
                }
            }

            foreach ($farben as $color) {
                if ($color == "green") {
                    $tmpTextMitSuffix = $tmpText . "-green";
                    $assignment["green"] = $tmpTextMitSuffix;

                    break;
                }
                else {
                    continue;
                }
                
                if (true) {
                    continue;
                }
            }
        }

        foreach ($farben as $color) {
            if ($color == "green") {
                $assignment["green"] = $assignment["green"] . '-> green';
            }
            elseif ($color == "blau") {
                $assignment["blau"] = $assignment["blau"] . '-> blau';
            }
            if ($color === 'red') {
                $assignment["red"] = $assignment["red"] . '-> red';
            }
        }

        $response = $assignment;

        return $response;
    }

    public function createReversedArraySplit($text) {
        $tmp_str_splitted = str_split($text);
        $tmp_str_splitted = array_reverse($tmp_str_splitted);
        $tmp_str_splitted = array_reverse($tmp_str_splitted);
        return $tmp_str_splitted;
    }
}
```

The logic behind this code is following:

```php
<?php

$badCode = new BadCode();
$badCode->processText('test', 3);

// -> this will return an array:
[
  "red" => "ttteeesssttt-red-> red",
  "blau" => "ttteeesssttt-blau-> blau"
  "green" => "ttteeesssttt-green-> green"
]

// -> if you change the second parameter - to "4" for example it would look like:
[
  "red" => "tttteeeesssstttt-red-> red",
  "blau" => "tttteeeesssstttt-blau-> blau"
  "green" => "tttteeeesssstttt-green-> green"
]
```

### Tech requirements
- use latest PHP version
- refactor everything you think needs some refactoring 
- please add some further notes, what you don’t like at this code, if there is something you want to mention

### Further instructions
- Organize the code, however you feel it is good
- Add all other information to the project, you think makes sense (Readme, Documentation, Instructions, ...)

[Back to overview](../README.md)