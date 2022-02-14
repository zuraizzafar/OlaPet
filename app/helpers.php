<?php
function get_drive_content() {
    return Storage::disk('google')->listContents('1w3BLYwxhXYpwgwURxXZk6-Rz1vcqYzmp');
}
function get_file_path($find, $drive) {
    $index = array_search($find, array_column($drive, 'name'));
    return Storage::disk('google')->url($drive[$index]['path']);
}