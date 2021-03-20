<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';

    protected $fillable = [
        'user_id',
        'questioner_id',
        'question',
        'questioner_ip',
        'answer',
        'answered'
    ];

    protected $casts = [
        'answered' => 'boolean'
    ];

    public function answer(string $answer) {
        $this->update([
            'answered' => true,
            'answer' => $answer
        ]);
    }
}
