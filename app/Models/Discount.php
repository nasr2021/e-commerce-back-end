<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'description',
        'metric',
        'amount',
        'for_all_companies',
        'for_all_products',
        'type',
        'start_date',
        'end_date',
        'active',
    ];
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'active' => 'boolean',
        'for_all_companies' => 'boolean',
        'for_all_products' => 'boolean',
    ];
     /**
     * Les relations de Discount avec les autres modèles.
     */
    public function companies()
    {
        return $this->belongsToMany(Company::class, 'company_discount');
    }

    // Relation avec la table Products (plusieurs produits peuvent avoir des réductions)
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_discount');
    }
    public function subCategories(){
        return $this->belongsToMany(SubCategory::class, 'sub_category_discount');
    }
}
