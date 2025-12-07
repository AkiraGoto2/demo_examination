<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование заявки</title>
    @include('layouts.flash-messages')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <x-app-layout>
        <div class="bg-white border rounded p-8 max-w-4xl mx-auto mt-8">
            <h1 class="text-4xl font-bold mb-8 text-red-600">Редактирование заявки</h1>
            
            <form action="{{ route('reports.update', $report->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('put')
                
                <div>
                    <label class="block text-lg font-medium text-gray-700 mb-2">Номер заявки</label>
                    <input type="text" name="number" value="{{ $report->number }}" 
                           class="w-full border rounded-lg px-4 py-3 text-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                
                <div>
                    <label class="block text-lg font-medium text-gray-700 mb-2">Описание</label>
                    <textarea name="description" rows="6"
                              class="w-full border rounded-lg px-4 py-3 text-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $report->description }}</textarea>
                </div>
                
                <div class="flex gap-3 pt-6">
                    <button type="submit" 
                            class="px-6 py-3 bg-blue-500 text-white rounded-lg text-lg hover:bg-blue-600">
                        Сохранить
                    </button>
                    <a href="{{ route('reports.index', $report->id) }}" 
                       class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg text-lg hover:bg-gray-50">
                        Отмена
                    </a>
                </div>
            </form>
        </div>
    </x-app-layout>
</body>
</html>