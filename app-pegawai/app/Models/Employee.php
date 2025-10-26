<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function PHPUnit\Framework\returnArgument;

class Employee extends Model
{
    protected $fillable = [ 
        'nama_lengkap', 
        'departemen_id',
        'jabatan_id',
        'email', 
        'nomor_telepon', 
        'tanggal_lahir', 
        'alamat', 
        'tanggal_masuk', 
        'status', 
    ]; 
    use HasFactory;
    public function department(){
        return $this->belongsTo(Department::class,'departemen_id','id');
    }
    public function position(){
        return $this->belongsTo(Position::class,'jabatan_id','id');
    }
    public function salaries(){
        return $this->hasMany(Salary::class,'karyawan_id','id');
    }
    public function attendances(){
        return $this->hasMany(Attendance::class,'karyawan_id','id');
    }
}
