<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookMark extends Model
{
    protected $table = 'tblBookMarks';

    protected $fillable = [
        'movieId',
        'fldTitle',
        'fldBackdropPath',
        'fldOverview',
        'fldMediaType',
    ];

    public function addBookMark($movieId, $data) {
        $bookMark = new self ();

        $bookMark->movieId = $movieId;
        $bookMark->fldTitle = $data['title'];
        $bookMark->fldBackdropPath = $data['backdropPath'];
        $bookMark->fldOverview = $data['overview'];
        $bookMark->fldMediaType = $data['mediaType'];

        $bookMark->save();

        return [
            'error' => false,
            'message' => 'Saved successfully'
        ];
    }
}
