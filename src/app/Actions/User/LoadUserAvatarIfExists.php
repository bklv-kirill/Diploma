<?php

namespace App\Actions\User;

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Orchid\Attachment\File;

class LoadUserAvatarIfExists
{
    public function __invoke(User $user, ?UploadedFile $uploadAvatar): void
    {
        if (!$uploadAvatar) return;

        $user->attachment()->where('group', 'avatar')->delete();

        $uploadAvatar = new File($uploadAvatar, 'images', 'avatar');
        $avatar = $uploadAvatar->load();

        $user->attachment()->syncWithoutDetaching($avatar->id);
    }
}
