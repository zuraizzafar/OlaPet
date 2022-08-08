<?php
$d = new DateTime('2030-01-01 23:59:59');
?>

<a href="{{ Storage::disk('s3')->temporaryUrl('index.html', now()->addMinutes(5) ) }}">
    5 Minutes Link
</a>
<br>
<a href="{{ Storage::disk('s3')->temporaryUrl('index.html', now()->addMinutes(10000) ) }}">
    Permananent Link
</a>
<p>
    {{now()->addMinutes(60) }}
</p>