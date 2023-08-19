<?php

function normalizeURL($url) {
    $url = str_replace(['http://', 'https://', 'www.'], '', $url);
    $url = trim($url, '/'); // Trim slashes on both sides
    return strtolower($url);
}

function getDomainFromURL($url) {
    return explode('/', $url)[0];
}

// Sample URLs for testing
$urlPairs = [
    ['http://example.com', 'https://example.com'],
    ['http://example.com/somepage', 'https://www.example.com/somepage'],
    ['http://example.com/somepage', 'https://www.example.com/some2page'],
    ['https://example.com/somepage/path', 'https://example2.com/somepage/path'],
    ['http://example.com', 'https://www.example.com/someotherpage']
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>URL Comparison</title>
    <style>
        .result {
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ccc;
        }
        .match {
            background-color: #d4edda; /* Green background for matches */
        }
        .mismatch {
            background-color: #f8d7da; /* Red background for mismatches */
        }
    </style>
</head>
<body>

<?php
foreach ($urlPairs as $pair) {
    $url1Normalized = normalizeURL($pair[0]);
    $url2Normalized = normalizeURL($pair[1]);

    $domain1 = getDomainFromURL($url1Normalized); echo ($domain1);echo "<br>";
    $domain2 = getDomainFromURL($url2Normalized); echo ($domain2);
    if ($domain1 === $domain2) {
        $resultClass = "match";
        $message = "MATCH!";
    } else {
        $resultClass = "mismatch";
        $message = "MISMATCH!";
    }

    echo "<div class='result $resultClass'>";
    echo "<strong>URL 1:</strong> {$pair[0]}<br>";
    echo "<strong>URL 2:</strong> {$pair[1]}<br>";
    echo "<strong>Result:</strong> $message<br>";
    echo "</div>";
}
?>

</body>
</html>
