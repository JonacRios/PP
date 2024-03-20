<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    use HasFactory;
    protected $fillable = ['primer_nombre', 'segundo_nombre', 'empresa_id', 'email', 'telefono'];

    public function empresa():belongsTo
    {
        return $this->belongsTo(Empresas::class);
    }

}
