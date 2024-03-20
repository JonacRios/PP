<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Empleados;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Empresa extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'direccion', 'telefono', 'email', 'img_path', 'sitio_web'];

    public function empleados():hasMany
    {
        return $this->hasMany(Empleados::class);
    }
    public function handleUploadImage($image)
    {
        $file = $image;
        $name = time() . $file->getClientOriginalName();
        //$file->move(public_path() . '/img/productos/', $name);
        Storage::putFileAs('/public/uploads',$file,$name,'public');

        return $name;
    }
}
