<?php

namespace YourNamespace\FileMonitor\Models;

use Illuminate\Database\Eloquent\Model;

class FileRecord extends Model
{
    protected $fillable = ['file_path', 'hash'];
}