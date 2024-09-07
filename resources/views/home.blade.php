<x-layout>
    <x-slot:pageTitle>
        Home
    </x-slot:pageTitle>
    <x-top-screen />
    <div class="flex justify-between text-white mb-8">
        <div class="bg-slate-600 h-max p-6 rounded-md ml-3" style="width: 400px">
            <ul>
                <h2 class="text-xl font-medium mb-3">Core Concept of MySQL</h2>
                <div class="ml-3">
                    <a href="">
                        What is MySQL?
                    </a>
                    <a href="#" class=" block text-rm font-semibold leading-6 text-slate-300 hover:text-white ">
                        What is MySQL 🤔
                    </a>
                    <a href="#" class="block text-rm font-semibold leading-6 text-slate-300 hover:text-white ">
                        How to create MySQL Database.<span>→</span>
                    </a>
                    <a href="#" class="block text-rm font-semibold leading-6 text-slate-300 hover:text-white ">
                        Learn more <span>→</span>
                    </a>
                </div>
            </ul>
        </div>
        <div class="w-fit rounded-md mr-3 ml-20">
            <section class="px-5">
                <h1 class="text-4xl font-bold">What is MySQL? 🤔</h1>
                <div class="tags my-4">
                    <span class="bg-green-500 px-1 py-1 mr-1 capitalize rounded text-sm">mysql</span>
                    <span class="bg-green-500 px-1 py-1 mr-1 capitalize rounded text-sm">mysql</span>
                </div>
                <div class="bg-slate-700 p-4 rounded-lg">
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora nam soluta consectetur qui
                        incidunt. Nulla, ullam inventore repellat, voluptatibus voluptatum molestiae laborum nobis alias
                        quam quaerat eos? Pariatur, vero voluptates!
                    </p>
                    <p class="mt-2">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facere cupiditate, provident neque,
                        soluta fugit deserunt, dicta veritatis quibusdam suscipit nobis voluptatum voluptatibus ipsum
                        consequatur hic. Deserunt quidem maiores laudantium animi.
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquam, porro vitae cumque
                        consequuntur unde corporis facere animi quasi ullam magnam, alias sint dolorum non laboriosam
                        commodi perspiciatis quibusdam dicta nulla.
                    </p>
                </div>
                <div>
                    <h1 class="mt-3">Just try here 😒</h1>
                    <textarea id="sql-editor"></textarea>
                    <button
                        class="rounded-md bg-indigo-600 px-12 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Run code 🚀
                    </button>
                    <div>
                    </div>
                </div>
                <div>
                    <h2 class="text-xl mb-2 mt-8">Related Topics</h2>
                    <ul>
                        <li>
                            <a href="#" class="ml-3 underline text-slate-300 hover:text-white transition">how to
                                create MySQL Database?</a>
                        </li>
                    </ul>
                </div>
            </section>
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
