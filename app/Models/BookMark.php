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

    public function displayBookMarks($page, $perPage) {
        $offset = ($page - 1 ) * $perPage;
        $totalRecords = self::count();
        $totalPages = ceil($totalRecords/$perPage);
        $records = self::offset($offset)->limit($perPage)->get();

        foreach ($records as $data) {
            $data->totalPages = $totalPages;
        }

        return $records;
    }

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
