<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = 'kegiatans';
    
    protected $fillable = [
        'nama_kegiatan',
        'slug',
        'gambar',
        'tanggal',
        'deskripsi'
    ];
}

// File: app/Http/Requests/KegiatanRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KegiatanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama_kegiatan' => ['required', 'unique:kegiatans'],
            'gambar'        => ['nullable', 'image'],
            'tanggal'       => ['required', 'date'],
            'deskripsi'     => ['required']
        ];
    }

    public function messages()
    {
        return [
            'nama_kegiatan.required' => 'Nama Kegiatan tidak boleh kosong.',
            'nama_kegiatan.unique'   => 'Nama Kegiatan sudah pernah dibuat.',
            'gambar.image'           => 'File harus berupa gambar.',
            'tanggal.required'       => 'Tanggal tidak boleh kosong.',
            'tanggal.date'           => 'Format tanggal tidak valid.',
            'deskripsi.required'     => 'Deskripsi tidak boleh kosong.'
        ];
    }
}