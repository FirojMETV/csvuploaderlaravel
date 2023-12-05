<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CsvDataAttribute extends Model
{
    use HasFactory;
    protected $fillable =['csv_data_id','attribute','value'];

    public function csvdata(){
        return $this->belongsTo(CsvData::class);
    }
}
