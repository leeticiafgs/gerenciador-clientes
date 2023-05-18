<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
                <form action="/logout" method="POST">
                    @csrf
                    <a href="/logout" 
                      class="nav-link" 
                      onclick="event.preventDefault();
                      this.closest('form').submit();">
                      Sair
                    </a>
                  </form>
            </div>
        </div>
    </div>
</x-app-layout>
