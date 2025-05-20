


@props(['active' => false])

<li>
    <a href="{{$link}}" class="flex {{ $active ? 'bg-gray-100 text-gray-900 dark:text-gray-900' : 'bg-transparent text-white dark:text-white'}} rounded-l-lg items-center p-2 hover:text-gray-900 dark:hover:text-white   hover:bg-gray-100 dark:hover:bg-gray-700 group">
            {{$slot}}
    </a>
</li>