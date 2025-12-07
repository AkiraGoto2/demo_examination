<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ панель</title>
    @include('layouts.flash-messages')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <x-app-layout>
        <div class="p-6">
            <h1 class="text-5xl font-bold mb-6 text-red-600">Админ панель</h1>

            <div class="bg-white border rounded-lg overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Имя</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Номер</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Описание</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Дата</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Статус</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($reports as $report)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $report->user->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    {{ $report->number }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900">
                                    {{ $report->description }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $report->created_at->format('d.m.Y H:i') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <div>
                                        <form class="status-form" action="{{route('reports.status.update', $report->id)}}" method="POST">
                                            @method('patch')
                                            @csrf
                                            <select name="status_id" id="status_id" data-current-status="{{ $report->status_id }}">
                                                @foreach($statuses as $status)
                                                <option value="{{$status->id}}" {{$status->id === $report->status_id ? 'selected' : ''}}>
                                                    {{$status->name}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </form> 
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if($reports->hasPages())
                <div class="mt-6">
                    {{ $reports->links() }}
                </div>
            @endif
        </div>
    </x-app-layout>
</body>
</html>