<?php
// app/Models/NewsletterSubscriber.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsletterSubscriber extends Model
{
    use HasFactory;

    protected $table = 'newsletter_subscribers'; // Make sure this matches the table name
    protected $fillable = ['email']; // The only field we are allowing mass assignment for is 'email'

    // Disable timestamps if you don't have 'created_at' and 'updated_at'
    public $timestamps = true;
}