<?php

function get_file_path($find, $drive) {
    $index = array_search($find, array_column($drive, 'name'));
    return Storage::disk('google')->url($drive[$index]['path']);
}