@props([
    'title' => '',
    'type' => 'text',
    'for' => 'field1',
    'placeholder' => '',
    'value' => '',
    'required' => '',
    'style' => '',
])

<div class="mt-4">
    <label for="{{ $for }}" class='block text-sm font-medium text-gray-300'>
        {{ $title == '' ? 'Enter ' . $for : $title }}
    </label>
    <x-form-error name="{{ $for }}" />
    <div class="mt-1">
        @if ($type == 'textarea')
            <textarea id="{{ $for }}" name="{{ $for }}"
                placeholder="{{ $placeholder == '' ? 'Enter ' . $for . ' text here...' : $placeholder }}"
                {{ $required == '' || $required == 'true' ? 'required1' : '' }} style="{{ $style }}"
                class="mt-1 w-full px-3 m-1 rounded-lg py-1 border outline-none border-slate-600 bg-transparent  focus:bg-slate-700 ">{{ $value }}</textarea>
        @elseif($type == 'select')
            <select style="width: 480px" name="{{ $for }}" id="{{ $for }}"
                class="mt-1 w-full cursor-pointer px-3 m-1 rounded-lg py-1 border outline-none border-slate-600 bg-transparent  focus:bg-slate-700 ">
                {{ $slot }}
            </select>
        @else
            <input type="{{ $type }}" id="{{ $for }}" name="{{ $for }}"
                value="{{ $value }}"
                placeholder="{{ $placeholder == '' ? 'Enter ' . $for . ' text here...' : $placeholder }}"
                {{ $required == '' || $required == 'true' ? 'required' : '' }} style="{{ $style }}"
                class='w-2/4 px-4 py-2 bg-gray-900 border outline-none border-gray-600 rounded-md text-gray-300 focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none focus:ring-2'>
        @endif
    </div>
</div>
