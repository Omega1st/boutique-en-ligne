<?php
namespace App\Http\Requests;use Illuminate\Foundation\Http\FormRequest;class PurchaseRequest extends FormRequest{public function authorize():bool{return(bool)$this->user();}public function rules():array{return['items'=>'required|array|min:1','items.*.product_id'=>'required|integer|distinct|exists:products,id','items.*.quantity'=>'required|integer|min:1|max:999'];}}
