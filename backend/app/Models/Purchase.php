<?php
namespace App\Models;use Illuminate\Database\Eloquent\Model;class Purchase extends Model{protected $fillable=['user_id','reference','status','total','purchased_at'];protected function casts():array{return['total'=>'decimal:2','purchased_at'=>'datetime'];}public function user(){return $this->belongsTo(User::class);}public function items(){return $this->hasMany(PurchaseItem::class);}}
