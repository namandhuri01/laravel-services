<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','title','description','status','priority','start_date','end_date'];

    protected $casts = [
        'start_date' => 'date',
        'end_date'  => 'date'
    ];

    protected $appends = ['status_name','priority_name'];

    public function getStatusNameAttribute()
    {
        $name = 'Pending';
        if ($this->status == 1) {
            $name = 'Active';
        }
        if ($this->status == 2) {
            $name = 'inActive';
        }
        return $name;
    }

    public function getPriorityNameAttribute()
    {
        $pName = 'Low';
        if ($this->status == 1) {
            $pName = 'medium';
        }
        if ($this->status == 2) {
            $pName = 'high';
        }
        return $pName;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
