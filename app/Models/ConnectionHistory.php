<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ConnectionHistory extends Model
{
    use HasFactory;

    protected $table = 'connection_history';
    protected $guarded = [];
    protected $appends = [
        'plan',
        'value_without_plan'
    ];

    //Função caso utilize Start e End, retorna o total de minutos.

    // public function getTotalMinutesAttribute()
    // {
    //     $start_connect = Carbon::createFromFormat($this->start_connect);
    //     $end_connect = Carbon::createFromFormat($this->end_connect);

    //     return $end_connect->diffInMinutes($start_connect);
    // }

    //Criando relações entre Historico e Planos
    public function getPlanAttribute()
    {
        return Plan::where('id', $this->plan_id)->first();
    }

    //Retorna o valor sem o plano
    public function getValueWithoutPlanAttribute()
    {
        $code = Code::where('origin', $this->origin)->where('destiny', $this->destiny)->first();

        return $this->total_minutes * $code->value;
    }
}
