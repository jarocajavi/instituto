<nav class="lg:h-nav  bg-nav flex flex-col lg:flex-row
px-5 justify-start items-center lg:space-x-2 ">
    <a href="{{route("main")}}" class="btn btn-glass  w-full lg:w-auto">{{__("About")}}</a>
    <a href="/noticias" class="btn btn-glass text-header  w-full lg:w-auto">{{__("News")}}</a>
    @auth
        <a href="/projects" class="btn btn-glass w-full lg:w-auto">{{__('Projects')}}</a>
        <a href="/teachers" class="btn btn-glass w-full lg:w-auto">{{__("Teachers")}}</a>
    @endauth
</nav>

