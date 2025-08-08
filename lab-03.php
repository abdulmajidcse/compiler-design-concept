<?php
// Lab 03: Lexical Analyzer using File I/O

$keywords = [
    "auto", "break", "case", "char", "const", "continue", "default",
    "do", "double", "else", "enum", "extern", "float", "for", "goto",
    "if", "int", "long", "register", "return", "short", "signed",
    "sizeof", "static", "struct", "switch", "typedef", "union",
    "unsigned", "void", "volatile", "while"
];

$operators = [
    "+", "-", "*", "/", "%",
    "=", "==", "!=", ">", "<",
    ">=", "<=", "&&", "||", "!",
    "+=", "-=", "*=", "/=", "%="
];

// Read file
$filename = "code.c"; // Input C code file
if (!file_exists($filename)) {
    die("File not found.\n");
}

$code = file_get_contents($filename);

// Remove unnecessary newlines, tabs
// $code = str_replace(["\r", "\n", "\t"], " ", $code);

// Split using space and symbols as delimiters
$tokens = preg_split('/([\s;]+)/', $code, -1, PREG_SPLIT_NO_EMPTY);
// $tokens = preg_split('/([\s;(){}[\],]+)/', $code, -1, PREG_SPLIT_NO_EMPTY);

// Classify tokens
$results = [
    'Keyword'    => [],
    'Identifier' => [],
    'Operator'   => [],
    'Number'     => [],
];

function addToken(string $token, array &$tokenArray): void
{
    if (!in_array($token, $tokenArray)) {
        $tokenArray[] = $token;
    }
}

foreach ($tokens as $token) {
    if (in_array($token, $keywords)) {
        addToken($token, $results['Keyword']);
    } elseif (in_array($token, $operators)) {
        addToken($token, $results['Operator']);
    } elseif (is_numeric($token)) {
        addToken($token, $results['Number']);
    } else {
        addToken($token, $results['Identifier']);
    }
}

// Print results
foreach ($results as $type => $tokens) {
    if (!empty($tokens)) {
        echo "Token: " . implode(", ", $tokens) . " -> $type\n";
    }
}
