<?php

# Temporary script before 6.10 switch

$release = $_GET['release'];
$arch = $_GET['arch'];
$repo = $_GET['repo'];

$valid_release = $release === '6';
$valid_arch = in_array($arch, array('x86_64'));
$valid_repo = in_array($repo, array('os', 'updates'));

if( ! $valid_release || ! $valid_arch || ! $valid_repo ) {
    header("HTTP/1.0 404 Not Found");
    exit(1);
}

$mirrors = file("../ce-mirrors");

foreach ($mirrors as $mirror) {
    $mirror = trim($mirror);
    echo "$mirror/6.9/$repo/$arch/\n";
}
