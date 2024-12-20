<?php
$songs = [
    'pop' => [
        ['title' => 'Shape of You', 'artist' => 'Ed Sheeran', 'year' => '2017'],
        ['title' => 'Bad Guy', 'artist' => 'Billie Eilish', 'year' => '2019'],
        ['title' => 'Blinding Lights', 'artist' => 'The Weeknd', 'year' => '2020']
    ],
    'rock' => [
        ['title' => 'Bohemian Rhapsody', 'artist' => 'Queen', 'year' => '1975'],
        ['title' => 'Sweet Child O\' Mine', 'artist' => 'Guns N\' Roses', 'year' => '1987'],
        ['title' => 'Nothing Else Matters', 'artist' => 'Metallica', 'year' => '1991']
    ],
    'jazz' => [
        ['title' => 'Take Five', 'artist' => 'Dave Brubeck', 'year' => '1959'],
        ['title' => 'So What', 'artist' => 'Miles Davis', 'year' => '1959'],
        ['title' => 'Giant Steps', 'artist' => 'John Coltrane', 'year' => '1960']
    ]
];

function getSongs($genre) {
    global $songs;
    return isset($songs[$genre]) ? $songs[$genre] : [];
}

function displaySong($song) {
    return "
    <div class='song-card'>
        <h3>{$song['title']}</h3>
        <p>Artist: {$song['artist']}</p>
        <p>Year: {$song['year']}</p>
    </div>";
}
?>
