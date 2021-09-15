<div>

    <div class="flex items-center justify-center mt-4">
        <x-jet-button data-bs-toggle="modal" data-bs-target="#CrearEvento" id="btn">{{ trans('lang.want_pub?') }}
        </x-jet-button>
    </div>

    @if (count($errors) > 0)
        <script>
            $(document).ready(function() {
                $('#CrearEvento').modal('show');
            });
        </script>
    @endif

    <div class="modal fade" id="CrearEvento" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="text-lg">{{ trans('lang.created_event') }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                {!! Form::open(['route' => 'dashboard.events.store', 'autocomplete' => 'off', 'files' => true, 'method' => 'post']) !!}
                <div class="modal-body">
                    @csrf
                    {{-- Input oculto --}}
                    {!! Form::hidden('user_id', auth()->user()->id) !!}
                    <div class="mb-3">
                        <input type="text" class="form-control" name="title" id="title"
                            placeholder="{{ trans('lang.titleEvent') }}">
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror                        
                    </div>
                    <div class="mb-3">
                        <label for="start">{{trans('lang.date_event')}}</label>
                        {!! Form::input('dateTime-local','event_date', date("Y-m-d\TH:i",strtotime($date)),  ['class' => 'form-control datepicker','autocomplete'=>'off','min' => $date]) !!}</div>
                    <div class="mb-3">
                        <textarea class="form-control" id="body" name="body"
                            placeholder="{{ trans('lang.desp_event') }}" rows="5"></textarea>
                        @error('body')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col col-lg-8 image-wrapper flex justify-center">
                            <img id="imageEvent" class="max-h-50 items-center bg-cover" src="" />
                        </div>
                        <div class="col col-lg-4 pt-2 bg-white flex flex-col justify-end">
                            <label
                                class="w-full flex flex-col items-center px-4 py-6 bg-gray-300 text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-black">
                                <svg class="w-4 h-4" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                </svg>
                                <span
                                    class="mt-2 text-base leading-normal text-center">{{ trans('lang.select_img') }}</span>
                                <input type='file' class="hidden" id="imgEventInp" name="file" />
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button"
                        class="inline-flex items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-800 focus:outline-none focus:border-red-800 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"
                        data-bs-dismiss="modal">{{ trans('auth.cancel') }}</button>
                    <x-jet-button class="bg-blue-800 hover:bg-blue-700 active:bg-blue-800 focus:border-blue-800">
                        {{ trans('lang.post_event') }}</x-jet-button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>


    @livewire('index')

    <script>
        /* Este scrip es para mostrar la imagen seleccionada en la etiqueta img */
        imgEventInp.onchange = evt => {
            const [file] = imgEventInp.files
            if (file) {
                imageEvent.src = URL.createObjectURL(file)
            }
        }
    </script>
</div>
