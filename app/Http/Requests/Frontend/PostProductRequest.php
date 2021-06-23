<?php

namespace App\Http\Requests\Frontend;

use App\Models\ControlPanel\Configuration\Category;
use App\Models\ControlPanel\Configuration\Property;
use App\Models\ControlPanel\Configuration\Section;
use App\Models\BusinessAccount;
use App\Models\PersonalAccount;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class PostProductRequest extends FormRequest
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
        $rules = [];

        if ( ! auth()->check()) {

            $rules['email'] = [
                'required',
                'max:255',
                function($attribute, $value, $fail) {
                    if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                        $fail('The ' . $attribute . ' format is not valid.');
                    }
                    if ( ! empty(User::where('email', $value)->first())) {
                        $fail('The ' . $attribute . ' has already been taken.');
                    }
                    if ( ! empty(PersonalAccount::where('email', $value)->first())) {
                        $fail('The ' . $attribute . ' has already been taken.');
                    }
                    if ( ! empty(BusinessAccount::where('email', $value)->first())) {
                        $fail('The ' . $attribute . ' has already been taken.');
                    }
                }
            ];

            $rules['phone'] = [
                'required',
                'max:255',
                function($attribute, $value, $fail) {
                    if ( ! empty(PersonalAccount::where('phone', $value)->first())) {
                        $fail('The ' . $attribute . ' has already been taken.');
                    }
                    if ( ! empty(BusinessAccount::where('phone', $value)->first())) {
                        $fail('The ' . $attribute . ' has already been taken.');
                    }
                }
            ];


            if ($this->account_type === 'Personal') {
                $rules['first_name'] = [
                    'required',
                    'max:255',
                    'string'
                ];

                $rules['last_name'] = [
                    'required',
                    'max:255',
                    'string'
                ];
            }

            if ($this->account_type === 'Business') {
                $rules['name'] = [
                    'required',
                    'max:255',
                    'string'
                ];

                $rules['type'] = [
                    'required',
                    Rule::in(['Retail', 'Wholesale']),

                ];
            }
        }

        $rules['category_type_id'] = [
            'required',
            'numeric'
        ];
        $rules['category_id.*'] = [
            'required',
            'numeric'
        ];

        $category = Category::where('id', $this->category_id[count($this->category_id )- 1])->first();
        $propertyIds = explode(',', $category->property_ids);
        $properties = Property::whereIn('id', $propertyIds)->get();

        foreach ($properties as $property) {
            $formattedPropertyName = strtolower(implode('_', explode(' ', $property->property)));

            if ($property->type === 'Image' && (int)$property->is_required === 1) {
                if (! Session::has('uploaded_files') || count(Session::get('uploaded_files')) === 0) {
                    $rules['image'] = [
                        'required',
                        'image',
                        'max:512',
                        'dimensions:min_width=800,min_height=450,max_width=1600,max_height=900'
                    ];
                }


            } elseif ($property->type === 'User Defined Input') {
                if ((int)$property->is_required === 1) {
                    $rules[$formattedPropertyName] = [
                        'required',
                        'array',
                        'min:1'
                    ];
                    $rules[$formattedPropertyName . '.*'] = [
                        'required',
                        'string',
                        'max:255'
                    ];

                    $rules[$formattedPropertyName . '_quantity'] = [
                        'required',
                        'array',
                        'min:0'
                    ];
                    $rules[$formattedPropertyName . '_quantity.*'] = [
                        'required',
                        'string',
                        'max:255'
                    ];
                } else {
                    $rules[$formattedPropertyName] = [
                        'nullable',
                        'array',
                        'min:1'
                    ];
                    $rules[$formattedPropertyName . '.*'] = [
                        'nullable',
                        'string',
                        'max:255'
                    ];

                    $rules[$formattedPropertyName . '_quantity'] = [
                        'nullable',
                        'array',
                        'min:1'
                    ];
                    $rules[$formattedPropertyName . '_quantity.*'] = [
                        'nullable',
                        'string',
                        'max:255'
                    ];
                }

            } elseif ($property->type === 'Input Group') {
                if ((int)$property->is_required === 1) {
                    $rules[$formattedPropertyName] = [
                        'required',
                        'array',
                        'min:1'
                    ];
                    $rules[$formattedPropertyName . '.*'] = [
                        'required',
                        'string',
                        'max:255'
                    ];
                } else {
                    $rules[$formattedPropertyName] = [
                        'nullable',
                        'array',
                        'min:1'
                    ];
                    $rules[$formattedPropertyName . '.*'] = [
                        'nullable',
                        'string',
                        'max:255'
                    ];
                }
            } else {

                if ((int)$property->is_required === 1) {
                    $rules[$formattedPropertyName] = [
                        'required',
                        'max:255',
                        'string'
                    ];
                } else {
                    $rules[$formattedPropertyName] = [
                        'nullable',
                        'max:255',
                        'string'
                    ];
                }
            }

        }

        return $rules;
    }
}
