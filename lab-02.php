<?php
// Lab 02: Pattern Matching using Basic Regex

$input = readline("Enter a string: ");

// starts with a, ends with b
$isMatched = preg_match('/^a.*b$/', $input);
// only vowels
// $isMatched = preg_match('/^[aeiouAEIOU]+$/', $input);

if ($isMatched) {
    echo "Accepted\n";
} else {
    echo "Rejected\n";
}
