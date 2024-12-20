<?php
if (isset($_GET['url'])) {
    $url = $_GET['url'];

    $content = @file_get_contents($url);
    if ($content === FALSE) {
        echo "Failed to retrieve content from the URL.";
    } else {
        $parsedUrl = parse_url($url);
        $host = $parsedUrl['host'] ?? 'unknown';
        $filename = "clone/" . $host . "_" . time() . ".html";
        if (!is_dir("clone")) {
            mkdir("clone", 0777, true);
        }
        file_put_contents($filename, $content);
        echo "Content cloned successfully!<br>";
        echo "Saved to <strong>$filename</strong><br><br>";
    }

} else {
    echo "No URL provided.";
}
?>

