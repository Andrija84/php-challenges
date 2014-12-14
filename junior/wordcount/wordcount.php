
<META http-equiv="Content-Type" content='text/html;charset="UTF-8"'>

<?php


$text = file_get_contents('polnoe-esenin.txt');
$words = utf8_str_word_count($text, 1);
$frequency = array_count_values($words);

arsort($frequency);

echo '<pre>';
print_r($frequency);
echo '</pre>';

function utf8_str_word_count($string, $format = 0, $charlist = null)
{
    $result = array();

    if (preg_match_all('~[\p{L}\p{Mn}\p{Pd}\'\x{2019}' . preg_quote($charlist, '~') . ']+~u', $string, $result) > 0)
    {
        if (array_key_exists(0, $result) === true)
        {
            $result = $result[0];
        }
    }

    if ($format == 0)
    {
        $result = count($result);
    }

    return $result;
}




