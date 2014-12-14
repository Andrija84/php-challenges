<?php
$lines = file("date-input.txt", FILE_SKIP_EMPTY_LINES);
$izlazniFajl = fopen('date-output.txt', 'a');



foreach($lines as $line) {



    $neobradjenDatum = trim($line);
    $phpDekodovanDatum = strtotime($neobradjenDatum);


    if ($phpDekodovanDatum !== false) {
        $datum = date('Y-m-d', $phpDekodovanDatum);
    }
    else  {
        if (preg_match("/(\d{2})#(\d{2})#(\d{2})/", $neobradjenDatum, $matches) === 1) {
            $dan = $matches[3];
            $mesec = $matches[1];
            $godina = $matches[2];
            $datum = "19{$godina}-{$mesec}-{$dan}";
        }
        elseif (preg_match("/(\d{2})\*(\d{2})\*(\d{2,4})/", $neobradjenDatum, $matches) === 1) {
            $dan = $matches[1];
            $mesec = $matches[2];
            $godina = $matches[3];
            $datum = "{$godina}-{$mesec}-{$dan}";
        }
        elseif (preg_match("/(\d{2})\/(\d{2})\/(\d{2})/", $neobradjenDatum, $matches) === 1) {
            $dan = $matches[2];
            $mesec = $matches[1];
            $godina = $matches[3];
            $datum = "19{$godina}-{$mesec}-{$dan}";
        }
        elseif (preg_match("/(\d{2})\/(\d{2})\/(\d{4})/", $neobradjenDatum, $matches) === 1) {
            $dan = $matches[2];
            $mesec = $matches[1];
            $godina = $matches[3];
            $datum = "{$godina}-{$mesec}-{$dan}";

        }

        elseif (preg_match("/([A-Z][a-z][a-z])\s(\d{2}).\s(\d{2})/", $neobradjenDatum, $matches) === 1) {
            $dan = $matches[2];
            $mesec = $matches[1];
            $godina = $matches[3];
            $datum = "19{$godina}-{$mesec}-{$dan}";
        }

        else {
            echo  "Ne mogu da dekodujem datum {$phpDekodovanDatum}";
        }
    }

    fwrite($izlazniFajl, $datum . "\n");
}
