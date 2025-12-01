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
	 <div class="card">
                <tr>
                    <td> <a href="{{route('reports.show',$report->id)}}"> {{ $report->number }}</a></td>
                    <td>{{ $report->description }}</td>
                    <td>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $report->created_at)->translatedFormat('j F Y h:i') }}</td>
					<td>
						<x-status :type="$report->status->id">
							{{ $report->status->name}}
						</x-status>
					</td>
                </tr>
            <form method="POST" action="{{route('reports.destroy', $report->id)}}">
                @method('delete')
                @csrf
                <input type="submit" value="Удалить">
            </form>
            <a href="{{route('reports.edit', $report->id)}}">Редактировать</a>
            </div>

    @endforeach

	{{$reports->links()}}
</x-app-layout>
</body>
</html>