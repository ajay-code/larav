<?php

namespace App\Models;

use Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Photo extends Model
{
    protected $table = 'product_images';

    protected $fillable = ['name'];

    protected $baseDir = 'product/photo';

    protected $file;

    protected $photoName;

    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public static function fromFile(UploadedFile $file)
    {
        $photo = new static;

        $photo->file = $file;

        $photo->photoName = $photo->fileName();

        return $photo->fill([
            'name' => $photo->photoName,
        ]);
    }

    public function fileName()
    {
        $name = sha1(
            time() . str_random('4')
        );
        $extension = $this->file->getClientOriginalExtension();

        $name = "{$name}.{$extension}";

        return $name;
    }

    public function filePath()
    {
        return sprintf("%s/%s", $this->baseDir, $this->name);
    }

    public function thumbnailPath()
    {
        return sprintf("%s/tn-%s", $this->baseDir, $this->name);
    }

    public function fileUrl()
    {
        return getStorageUrl(sprintf("/%s/%s", $this->baseDir, $this->name));
    }

    public function thumbnailUrl()
    {
        return getStorageUrl(sprintf("/%s/tn-%s", $this->baseDir, $this->name));
    }


    public function upload()
    {
        Storage::putFileAs($this->baseDir, $this->file, $this->name);

        $this->makeThumbnail();

        return $this;
    }

    public function makeThumbnail()
    {
        Image::make($this->file)
            ->fit(200)
            ->save(storagePath($this->storageDir . $this->thumbnailPath()));
    }

    public function delete()
    {
        Storage::delete([
            $this->path,
            $this->thumbnail_path
        ]);
        parent::delete();
    }


}
