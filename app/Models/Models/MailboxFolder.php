<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailboxFolder extends Model
{
    use HasFactory;
    protected $table = "mailbox_folders";
    protected $fillable = ["title", "icon"];
}
