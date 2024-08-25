<?php

function emptyImage()
{
    return asset("/asset/icon/no_image.webp");
}
function Encryption($value)
{
    return base64_encode($value);
}
function Decryption($value)
{
    return base64_decode($value);
}
