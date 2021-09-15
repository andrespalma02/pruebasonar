<div class="container py-8 ">

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
        @foreach ($events as $event)
            <div class="container mx-auto px-4 d-flex align-items-stretch">
                <div class="w-full max-w-md mx-auto bg-white shadow-md rounded-md px-6 py-4 my-6">
                    <div class="sm:flex sm:justify-between">
                        <div class="d-flex">
                            @if (!$event->user->profile_photo_path)
                                <img class="h-12 w-12 rounded-full d-flex align-items-center"
                                src="{{asset('image/logo.png')}}" alt="" />
                            @else
                                <img class="h-12 w-12 rounded-full d-flex align-items-center"
                                src="{{ asset('storage/' . $event->user->profile_photo_path) }}" alt="{{ $event->user->profile_photo_path }}" />
                            @endif
                                <div class="ml-2">
                                <h3 class="text-lg text-gray-800 font-medium">
                                    {{ Str::limit($event->user->name, 25) }}</h3>
                                <span class="text-gray-600">{{ trans('lang.published') }}
                                    {{ $event->created_at->diffForHumans() }}</span>
                                @if (strtotime($event->event_date) < strtotime($date))
                                    <p class="text-red-400 text-xs">
                                        {{ trans('lang.event_finish') }}
                                        {{ \Carbon\Carbon::parse($event->event_date)->diffForHumans($date) }}
                                    </p>
                                @else
                                    <p class="text-blue-400 text-xs">
                                        {{ trans('lang.start') }}
                                        {{ \Carbon\Carbon::parse($event->event_date)->diffForHumans($date) }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-between items-center mt-4 row">
                        <div class="col">
                            <a href="{{ route('dashboard.events.show', $event) }}"
                                class="leading-tight text-black hover:text-black no-underline hover:underline mt-2 text-xl font-medium text-break">{{ Str::limit($event->title, 70) }}</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-lg-6 pt-2 flex flex-row">
                            <p class="text-gray-400 text-sm text-break">{{ Str::limit($event->body, 150) }}</p>
                        </div>
                        <div class="col col-lg-6 image-wrapper flex justify-center justify-content-start">
                            @if ($event->image)
                                <img class="w-full h-full" src="{{ asset('storage/' . $event->image->url) }}"
                                    alt="{{ $event->title }}">
                            @else
                                <img class="w-10/12 h-full " src="{{asset('image/logo.png')}}" alt="">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $events->links() }}
</div>
