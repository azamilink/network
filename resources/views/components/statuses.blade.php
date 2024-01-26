@foreach ($statuses as $status)
    <x-card>
        <div class="flex">
            <div class="flex-shrink-0 mr-3">
                <img src="{{ $status->user->gravatar() }}" alt="{{ $status->user->name }}" class="w-10 h-10 rounded-full">
            </div>
            <div>
                <div class="font-semibold">
                    {{ $status->user->name }}
                </div>
                <div class="leading-relaxed">
                    {{ $status->body }}
                </div>
                <div class="text-sm text-gray-600">
                    {{ $status->created_at->diffForHumans() }}
                </div>
            </div>
        </div>
    </x-card>
@endforeach
