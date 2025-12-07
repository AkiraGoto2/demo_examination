<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
	
	    @include('layouts.flash-messages')
	@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
	<x-app-layout>
        
    <header class="flex  items-center gap-4 p-4 rounded-xl space-between">
    
            <a href="{{ route('reports.create') }}" class="px-5 py-3 bg-red-600 text-white font-bold text-lg rounded-xl hover:bg-red-700 transition">Создать</a>
            <div class="flex-grow">
                <x-filter :sort=$sort :status=$status></x-filter>
            </div>
        </header>
    
	
     @foreach ($reports as $report)
    <x-card :report="$report" />
	@endforeach

	{{ $reports->links() }}

</x-app-layout>
</body>
</html>