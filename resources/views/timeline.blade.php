<x-app-layout>
    <x-container>
        <div class="grid grid-cols-12 gap-6">
            {{-- KOLOM 1 --}}
            <div class="col-span-7">
                {{-- FORM TO POST --}}
                <div class="border rounded-xl p-5">
                    <form action="{{ route("statuses.store") }}" method="post">
                        @csrf
                        <div class="flex">
                            <div class="flex-shrink-0 mr-3">
                                <img src="{{ Auth::user()->gravatar() }}" alt="{{ Auth::user()->name }}" class="w-10 h-10 rounded-full">
                            </div>
                            <div class="w-full">
                                <div class="font-semibold">
                                    {{ Auth::user()->name }}
                                </div>
                                <div class="my-2">
                                    <textarea name="body" id="body" placeholder="What is on your mind ?" class="form-textarea w-full border-gray-300 rounded-xl resize-none focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200">
                                    </textarea>
                                </div>
                                <div class="text-right">
                                    <x-button>Post</x-button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- AKHIR FORM TO POST --}}

                {{-- STATUS --}}
                <div class="space-y-6 mt-5">
                    <div class="space-y-5">
                        <x-statuses :statuses="$statuses"></x-statuses>
                    </div>
                </div>
                {{-- AKHIR STATUS --}}
            </div>
            {{-- AKHIR KOLOM 1 --}}

            {{-- KOLOM 2 --}}
            @if (Auth::user()->follows()->count())
                <div class="col-span-5">
                    <x-card>
                        <h1 class="font-semibold mb-5">Recently follows</h1>
                        <div class="space-y-5">
                            <x-following :users="Auth::user()
                                ->follows()
                                ->limit(5)
                                ->get()" />
                        </div>
                    </x-card>
                </div>
            @endif
            {{-- Akhir Kolom 2 --}}

        </div>
    </x-container>
</x-app-layout>
