<?php

namespace App\Console\Commands\Fake\User;

use App\Actions\User\LoadUserAvatarIfExistsAction;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class LoadUserAvatar extends Command
{
    protected $signature = 'user-avatar:load';

    protected $description = 'Command for load user avatar';

    public function handle(LoadUserAvatarIfExistsAction $loadUserAvatarIfExists)
    {
        $avatarsPaths = Storage::disk('images')->allFiles('fake/user');
        $users = User::applicants()->get();

        $users->each(function (User $user) use ($avatarsPaths, $loadUserAvatarIfExists) {
            $avatarPath = Arr::random($avatarsPaths);
            $avatarName = File::name(Arr::random($avatarsPaths)) . '.' . File::extension(Arr::random($avatarsPaths));

            $uploadAvatar = new UploadedFile(Storage::disk('images')->path($avatarPath), $avatarName);

            $loadUserAvatarIfExists($user, $uploadAvatar);
        });

        dd('User avatar have been loaded');
    }
}
