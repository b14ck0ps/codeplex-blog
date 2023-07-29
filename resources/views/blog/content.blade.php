@extends('Layout.app')
@section('content')
    <main class="p-5 mx-auto sm:w-3/4 ">
        <h1 class="text-3xl font-bold sm:text-5xl">Use Git like a senior enginner</h1>
        <img class="mx-auto my-8" src="https://miro.medium.com/v2/resize:fill:160:112/1*c98MmRRHROTav94yXKNMYw.png"
            alt="cover">
        <p>
            In this article, I will show you how to use Git like a senior engineer. I will show you how to use Git in
            a team environment and how to use Git in a single developer environment. I will also show you
            how to use Git in a team environment and how to use Git in a single developer environment. I
            will also show you how to use Git in a team environment and how to use Git in a single
            developer environment.

            Let's be real. These logs aren't impressing anyone. They are boring. And they're full of information that you
            don't really need right now. You're trying to get a high-level understanding of what has been going on in your
            project.

            Using --graph and --format we can quickly get a summary view of git commits in our project.

            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id alias non consequatur quis quos temporibus commodi
            consectetur. Molestiae possimus vero sint, accusamus, modi harum suscipit hic ullam amet provident eaque?
            Quos ratione nostrum voluptas consequatur, quae eligendi labore deleniti sapiente debitis! Eligendi, architecto
            aliquam maiores inventore dolores itaque deleniti laborum. Distinctio quia repellendus laudantium aliquam odio,
            possimus ut iusto quis!
        </p>
    </main>
    <footer
        class="fixed bottom-0 flex justify-around w-full py-3 bg-white border-t-2 border-opacity-25 border-t-gray-200 sm:py-5">
        <button class="flex items-center gap-1">
            @svg('phosphor-hands-clapping-thin', 'w-5')
            8k
        </button>
        <button class="flex items-center gap-1">
            @svg('uni-comment-dots-thin', 'w-5')
            20
        </button>
    </footer>
@endsection
