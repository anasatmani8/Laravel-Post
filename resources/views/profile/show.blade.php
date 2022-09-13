<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Titre
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th></th>
               
              
            </tr>
        </thead>
        <tbody>
            @foreach (auth()->user()->posts as $post)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                   {{ $post->titel }}
                </th>
                <td class="px-6 py-4">
                    {{ Str::limit($post->body,50) }}
                </td>
              
                <td class="px-6 py-4 text-right">
                                        <a href="{{ route('post.edit', $post->slug) }}" class="btn btn-sm btn-warning">Modifier</a>

                        <form id="{{ $post->id }}" action="{{ route('post.delete', $post->slug) }}" method="post">
                            @csrf
                            @method('DELETE')
                            </form>
                            <button

                            
                            onclick="event.preventDefault();
                            if(confirm('Etes-vous sûr?'))
                            document.getElementById('{{ $post->id }}').submit();"
                            class="btn btn-sm btn-danger" type="submit">supprimer</button>
                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-jet-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-jet-section-border />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-jet-section-border />
            @endif

            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-jet-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
