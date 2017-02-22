<?php
function getStorageUrl($path = null)
{
    if ($path) {
        return url('storage/' . $path);
    }
    return url('storage/');
}

function assetUrl($path = null)
{
    if ($path) {
        return url($path);
    }

    return url('');
}

function storagePath($path = null)
{
    if ($path) {
        $path = trim($path, '/');
        return storage_path() . '/app/' . $path;
    }
    return storage_path() . '/app';
}

function gravatar($email = 'xyz.com'){
    return 'https://www.gravatar.com/avatar/' . md5($email) .'?s=50&d=mm';
}
function active($path, $active = 'active')
{
    return Request::is($path) ? $active : '';
}
