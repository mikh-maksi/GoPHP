<?php
/*function translit($text) {
                $trans = array(
                                        "а" => "a",
                                        "б" => "b",
                                        "в" => "v",
                                        "г" => "g",
                                        "д" => "d",
                                        "е" => "e", 
                                        "ё" => "e",
                                        "ж" => "zh",
                                        "з" => "z",
                                        "и" => "i",
                                        "й" => "y",
                                        "к" => "k",
                                        "л" => "l", 
                                        "м" => "m",
                                        "н" => "n",
                                        "о" => "o",
                                        "п" => "p",
                                        "р" => "r",
                                        "с" => "s",
                                        "т" => "t",
                                        "у" => "u",
                                        "ф" => "f",
                                        "х" => "kh",
                                        "ц" => "ts",
                                        "ч" => "ch",
                                        "ш" => "sh",
                                        "щ" => "shch",
                                        "ы" => "y",
                                        "э" => "e",
                                        "ю" => "yu",
                                        "я" => "ya",
                                        "А" => "A",
                                        "Б" => "B",
                                        "В" => "V",
                                        "Г" => "G",
                                        "Д" => "D",
                                        "Е" => "E",
                                        "Ё" => "E",
                                        "Ж" => "Zh",
                                        "З" => "Z",
                                        "И" => "I",
                                        "Й" => "Y",
                                        "К" => "K",
                                        "Л" => "L",
                                        "М" => "M",
                                        "Н" => "N",
                                        "О" => "O",
                                        "П" => "P",
                                        "Р" => "R",
                                        "С" => "S",
                                        "Т" => "T",
                                        "У" => "U",
                                        "Ф" => "F",
                                        "Х" => "Kh",
                                        "Ц" => "Ts",
                                        "Ч" => "Ch",
                                        "Ш" => "Sh",
                                        "Щ" => "Shch",
                                        "Ы" => "Y",
                                        "Э" => "E",
                                        "Ю" => "Yu",
                                        "Я" => "Ya",
                                        "ь" => "",
                                        "Ь" => "",
                                        "ъ" => "",
                                        "Ъ" => ""
                                );
                if(preg_match("/[а-яА-Я]/", $text)) {
                        return strtr($text, $trans);                    
                }
                else {
                        return $text;
                }
                                
        }

*/
function rus2translit($string) {
    $converter = array(
        'а' => 'a',   'б' => 'b',   'в' => 'v',
        'г' => 'g',   'д' => 'd',   'е' => 'e',
        'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
        'и' => 'i',   'й' => 'y',   'к' => 'k',
        'л' => 'l',   'м' => 'm',   'н' => 'n',
        'о' => 'o',   'п' => 'p',   'р' => 'r',
        'с' => 's',   'т' => 't',   'у' => 'u',
        'ф' => 'f',   'х' => 'kh',   'ц' => 'ts',
        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'shch',
        'ь' => '',  'ы' => 'y',   'ъ' => '',
        'э' => 'e',   'ю' => 'yu',  'я' => 'ya',
        
        'А' => 'A',   'Б' => 'B',   'В' => 'V',
        'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
        'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
        'И' => 'I',   'Й' => 'Y',   'К' => 'K',
        'Л' => 'L',   'М' => 'M',   'Н' => 'N',
        'О' => 'O',   'П' => 'P',   'Р' => 'R',
        'С' => 'S',   'Т' => 'T',   'У' => 'U',
        'Ф' => 'F',   'Х' => 'Kh',   'Ц' => 'Ts',
        'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Shch',
        'Ь' => '',  'Ы' => 'Y',   'Ъ' => '',
        'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
    );
    return strtr($string, $converter);
}

function str2url($str) {
    // переводим в транслит
    $str = rus2translit($str);
    // в нижний регистр
    $str = strtolower($str);
  // заменям все ненужное нам на "-"
    $str = preg_replace('~[^-a-z0-9_]+~u', '-', $str);
    // удаляем начальные и конечные '-'
    $str = trim($str, "-");
    return $str;
}
function str2login($str) {
    // переводим в транслит
    $str = rus2translit($str);
    // в нижний регистр
    $str = strtolower($str);
  // заменям все ненужное нам на "-"
  //  $str = preg_replace('~[^-a-z0-9_]+~u', '-', $str);
    // удаляем начальные и конечные '-'
    //$str = trim($str, "-");
    return $str;
}

?>