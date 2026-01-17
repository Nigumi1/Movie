<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookMark extends Model
{
    protected $table = 'tblBookMarks';

    protected $fillable = [
        'movieId',
        'fldMediaType',
    ];

    public function addBookMark($movieId, $mediaType) {
        $bookMark = new self ();

        $bookMark->movieId = $movieId;
        $bookMark->fldMediaType = $mediaType;

        $bookMark->save();

        return [
            'error' => false,
            'message' => 'Saved successfully'
        ];
    }
}
