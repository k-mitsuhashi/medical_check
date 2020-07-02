<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class RecordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'date' => 'required|date|before_or_equal:today',
            'course' => [
                'required',
                Rule::in(array_keys(config('const.course'))),
            ],
            'place' => 'required|string',
            // フォームに無い項目
            'year' => [
                'required', 'integer',
                Rule::unique('records')->where(function ($query) {
                    $query->where('user_id', intval($this->id));
                }),
            ],
        ];
    }

    /**
     * バリデーション前にリクエスト値を追加する
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        if ($this->filled('date')) {
            // 年度の追加
            $year = Carbon::create($this->date)->fiscalYear();
            $this->merge(compact('year'));
        }
    }
}
