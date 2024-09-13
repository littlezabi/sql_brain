<x-layout>
    <x-slot:pageTitle>
        Home
    </x-slot:pageTitle>

    <x-top-screen />
    <div class="text-white mb-8">
        <div class="flex justify-center flex-wrap h-max">
            @foreach ($categories as $cat)
                <section class="m-2 rounded-md p-2 mb-8 w-max bg-color" style="width:30.33333%">
                    <h2 class="text-3xl font-medium mb-4 mt-6 text-center  ">{{ $cat->title }}</h2>
                    <div class="">
                        <div class="bg-color2 py-3 rounded-md px-5" style="width:100%">
                            {{ $cat->description }}
                        </div>
                        <div class="ml-3">
                            @foreach ($cat->posts as $post)
                                <a href="/{{ $cat->slug }}/{{ $post->slug }}"
                                    class=" text-sm block my-2 transition-colors text-slate-300  hover:text-white hover:underline">
                                    {{ $post->title }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </section>
            @endforeach
        </div>

    </div>
</x-layout>
<script>
    var editor = CodeMirror.fromTextArea(document.getElementById("sql-editor"), {
        mode: "text/x-mysql",
        theme: "monokai",
        lineNumbers: true,
    });
</script>
