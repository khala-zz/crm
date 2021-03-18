<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailboxUserFolder extends Model
{
    use HasFactory;
    protected $table = "mailbox_user_folders";
    protected $fillable = ["user_id", "mailbox_id", "folder_id"];
    public function folder()
    {
        return $this->belongsTo(MailboxFolder::class, "folder_id");
    }
}
