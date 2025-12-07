<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $report->number }}</title>
    @include('layouts.flash-messages')
</head>
<body>
    <x-app-layout>
        <div class="bg-white border rounded p-8 max-w-6xl mx-auto mt-8">
            <div class="flex justify-between items-start mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $report->number }}</h1>
                    <div class="text-lg text-gray-600">
                        {{ $report->created_at->format('d.m.Y H:i') }}
                    </div>
                </div>
                <div class="flex gap-2">
                    <a href="{{ route('reports.edit', $report->id) }}" 
                       class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                        Редактировать
                    </a>
                    <form method="POST" action="{{ route('reports.destroy', $report->id) }}" 
                          onsubmit="return confirm('Удалить заявку?')">
                        @method('delete')
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                            Удалить
                        </button>
                    </form>
                </div>
            </div>
            
            <div class="mb-6">
                <x-status :type="$report->status->id">
                    {{ $report->status->name }}
                </x-status>
            </div>
            
            <div class="border-t pt-6">
                <h2 class="text-xl font-semibold mb-4">Описание</h2>
                <div class="text-gray-700 text-lg leading-relaxed">
                    {{ $report->description }}
                </div>
            </div>
            
            <div class="border-t pt-6 mt-8">
                <a href="{{ route('reports.index') }}" 
                   class="inline-flex items-center text-blue-600 hover:text-blue-800">
                    ← Назад к списку заявок
                </a>
            </div>
        </div>
    </x-app-layout>
</body>
</html>