<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;

class MemberImage extends ApiModel  
{
    protected static $logTitle = "Member Image";
    protected static $logName = "member_image";

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'member_images';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['member_id', 'file_name', 'file_path', 'thumb_path', 'icon_path', 'created', 'modified', 'active'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created', 'modified'];

    /**
     * Appended attributes
     */
    protected $appends = ['url', 'thumb_url'];

    public function scopeRecent($query) {
        return $query->latest()->limit(1);
    }

    public function member() {
        return $this->belongsTo(Member::class);
    }

    public function getUrlAttribute() {
        $save_dir_root = config('app.file_upload_root_directory');
        $host_server = config('app.file_upload_host_server');

        return "{$host_server}{$save_dir_root}/{$this->file_path}/{$this->file_name}";
    }

    public function getThumbUrlAttribute() {
        $save_dir_root = config('app.file_upload_root_directory');
        $host_server = config('app.file_upload_host_server');

        return "{$host_server}{$save_dir_root}/{$this->thumb_path}/{$this->file_name}";
    }

    public function getActivitylogOptions(): LogOptions
    {
        $title = static::$logTitle;
        $name = static::$logName;

        $member = $this->member;

        return LogOptions::defaults()
            ->logAll()
            ->useLogName("member_profile")
            ->setDescriptionForEvent(function(string $eventName) use($member, $title, $name) {
                if( $eventName == 'created' ) {
                    return __("Uploaded image to profile of :name", ["name" => $member->full_name]);
}

                return ucfirst($eventName) . " {$title} - {$name}";
            });
    }
}
