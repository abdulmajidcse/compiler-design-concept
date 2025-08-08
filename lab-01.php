<?php
// Lab 01: Token Identification Basics

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

function isKeyword(string $token): bool {
    global $keywords;
    return in_array($token, $keywords);
}

function isOperator(string $token): bool {
    global $operators;
    return in_array($token, $operators);
}

function isNumber(string $token): bool {
    return is_numeric($token);
}

$input = "int a = 5;  float b = a + 3.14";

// Tokenize input (split by whitespace, semicolon)
$tokens = preg_split('/[\s;]+/', $input, -1, PREG_SPLIT_NO_EMPTY);

foreach ($tokens as $token) {
    if (isKeyword($token)) {
        echo "Token: $token -> Keyword\n";
    } elseif (isOperator($token)) {
        echo "Token: $token -> Operator\n";
    } elseif (isNumber($token)) {
        echo "Token: $token -> Number\n";
    } else {
        echo "Token: $token -> Identifier\n";
    }
}
