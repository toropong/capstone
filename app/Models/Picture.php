<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Picture extends Model
{
    public $incrementing = true;
    public $timestamps = true;
    protected $table = 'picture';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'work_no',
        'file_name',
        'picture_year',
    ];

    /**
     * work 모델에 대응하는 picture 를 생성합니다
     * @param \Illuminate\Http\UploadedFile $file
     * @return Picture|null
     */
    public static function addPictureToWork(Work $work, $file)
    {
        if (!$work || !$file)
            return null;
        $path = self::addFile($file);
        return self::create([
            'work_no' => $work->getID(),
            'file_name' => $path,
            'picture_year' => $work->year,
        ]);
    }

    /**
     * work 모델에 대응하는 모든 picture 들을 가져옵니다
     */
    public static function getPicturesFromWork(Work $work)
    {
        return self::where('work_no', $work->getID())->get();
    }

    /**
     * 파일이 저장되는 /storage/app 경로 입니다
     * @return string
     */
    protected static function storage_path()
    {
        return 'public/pictures/';
    }

    /**
     * 파일을 출력하는 /public 경로 입니다
     */
    protected static function public_path()
    {
        return '/pictures/';
    }

    /**
     * storage 에 파일을 생성합니다
     * @param \Illuminate\Http\UploadedFile $file
     * @return string 파일이름
     */
    protected static function addFile($file)
    {
        $path = Storage::put(self::storage_path(), $file);
        return basename($path);
    }

    /**
     * 클라이언트에서 파일을 출력할 url을 가져옵니다
     * @return string 파일경로URL
     */
    public function getPath()
    {
        return $this->public_path() . $this->file_name;
    }

    /**
     * 해당 picture 에 대응하는 work 를 가져옵니다
     * @return Work
     */
    public function getWork()
    {
        return $this->belongsTo(Work::class, 'work_no');
    }

    // 기존 Model 클래스 메소드들을 오버라이딩합니다
    // delete 메소드는 이벤트로 대체될 수 있습니다
    public function delete()
    {
        // DB에서 picture row를 삭제하기 전에 해당 파일을 삭제합니다
        Storage::delete($this->storage_path() . $this->file_name);
        return parent::delete();
    }
}
