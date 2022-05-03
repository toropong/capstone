<?php

namespace App\Observers;

use App\Models\Picture;
use Illuminate\Support\Facades\Storage;

class PictureObserver
{
    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    public $afterCommit = false;

    /**
     * Handle the Picture "created" event.
     *
     * @param  \App\Models\Picture  $picture
     * @return void
     */
    public function created(Picture $picture)
    {
        //
    }

    /**
     * Handle the Picture "updated" event.
     *
     * @param  \App\Models\Picture  $picture
     * @return void
     */
    public function updated(Picture $picture)
    {
        //
    }

    /**
     * Handle the Picture "deleted" event.
     *
     * @param  \App\Models\Picture  $picture
     * @return void
     */
    public function deleted(Picture $picture)
    {
        //
    }

    // DB row가 삭제되기 전에 작동합니다
    // cascade delete 로 삭제되면 작동하지 않습니다
    public function deleting(Picture $picture)
    {
        // DB에서 picture row를 삭제하기 전에 해당 파일을 삭제합니다
        Storage::delete(Picture::storage_path() . $picture->file_name);
    }

    /**
     * Handle the Picture "restored" event.
     *
     * @param  \App\Models\Picture  $picture
     * @return void
     */
    public function restored(Picture $picture)
    {
        //
    }

    /**
     * Handle the Picture "force deleted" event.
     *
     * @param  \App\Models\Picture  $picture
     * @return void
     */
    public function forceDeleted(Picture $picture)
    {
        //
    }
}
