@props(['name'])

@error($name)
    <p class="text-red-400 text-sm bold">{{ $message }}</p>
@enderror
