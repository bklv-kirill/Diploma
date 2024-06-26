<?php

namespace App\Actions\User;

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Orchid\Attachment\File;

class LoadUserAvatarIfExistsAction
{
    public function __invoke(User $user, ?UploadedFile $uploadAvatar): void
    {
        if (is_null($uploadAvatar)) return;

        $user->attachment()->where('group', 'avatar')->delete();

        $uploadAvatar = new File($uploadAvatar, 'images', 'avatar');
        $avatar = $uploadAvatar->load();

        $user->attachment()->attach($avatar->id);
    }
}
