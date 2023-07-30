@extends('Layout.skeleton.write')
@section('content')
    <main class="p-3 mt-5 lg:w-3/4 lg:m-auto lg:mt-10">
        <form action="{{ route('writePost') }}" method="POST" id="post_blog_Form" enctype="multipart/form-data">
            @csrf
            <input class="w-full mb-10 text-4xl focus:outline-none lg:text-5xl" type="text" value="{{ old('title') }}"
                placeholder="Title" name="title">
            <section class="flex flex-col my-4">
                <input type="file" name="cover" id="cover">
                <label class="mt-2 text-sm text-gray-700" for="cover">Cover Photo for Article</label>
            </section>
            <textarea value="{{ old('content') }}" id="content" class="w-full mt-5 ml-1 h-96 focus:outline-none lg:text-xl"
                placeholder="Tell Your story..." name="content"></textarea>
        </form>
    </main>

    <script>
        document.getElementById('submit_blog_Btn').addEventListener('click', function() {
            document.getElementById('post_blog_Form').submit();
        });

        // Initialize TinyMCE without the heading option in the toolbar
        tinymce.init({
            selector: '#content',
            plugins: 'autolink link image print preview hr anchor pagebreak',
            toolbar_mode: 'floating',
        });
    </script>
@endsection
