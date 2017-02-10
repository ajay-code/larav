<?php
function getStorageUrl($path = null)
{
    if ($path) {
        return url('storage/'.$path);
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

function storagePath($path=null){
    if($path){
        $path = trim($path, '/');
        return storage_path() . '/app/' . $path;
    }
    return storage_path() . '/app';
}

function active($path, $active = 'active'){
    return Request::is($path) ? $active : '';
}
