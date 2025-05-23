<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KegiatanRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama_kegiatan' => ['required', 'string'],
            'tanggal' => ['required', 'date'],
            'deskripsi' => ['required', 'string'],
            'gambar' => ['nullable', 'image', 'max:2048'],
            'is_active' => ['required', 'in:0,1'],
            'slug' => ['required', 'string']
        ];
    }

    public function messages()
    {
        return [
            'nama_kegiatan.required' => 'Nama Kegiatan tidak boleh kosong.',
            'nama_kegiatan.string' => 'Nama Kegiatan harus berupa teks.',
            'tanggal.required' => 'Tanggal tidak boleh kosong.',
            'tanggal.date' => 'Format Tanggal tidak valid.',
            'deskripsi.required' => 'Deskripsi tidak boleh kosong.',
            'deskripsi.string' => 'Deskripsi harus berupa teks.',
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.max' => 'Ukuran gambar maksimal 2MB.',
            'is_active.required' => 'Status aktif harus diisi.',
            'is_active.in' => 'Status aktif hanya boleh 0 atau 1.',
            'slug.required' => 'Slug tidak boleh kosong.',
            'slug.string' => 'Slug harus berupa teks.'
        ];
    }
}
