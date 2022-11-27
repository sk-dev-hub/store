@extends('admin.layouts.main')

@section('content')
        
<main>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Page header -->
        <div class="sm:flex sm:justify-between sm:items-center mb-5">

            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-slate-800 font-bold">Тег ✨</h1>
            </div>

                        <!-- Right: Actions -->
                        <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">
                       
                        <!-- Edit category button -->
                        <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white">
                            <a href="{{ route('admin.tag.edit', $tag->id) }}">
                                <span class="hidden xs:block">Редактировать</span>
                            </a>
                        </button>
                       
                            <!-- Delete category button -->
                        <form action="{{ route('admin.tag.delete', $tag->id) }}" class="btn bg-rose-500 hover:bg-rose-600 text-white cursor-pointer" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" class="hidden xs:block cursor-pointer" value="Удалить">
                        </form>    


            
                        </div>

        </div>

        <!-- Table -->
        <div class="bg-white shadow-lg rounded-sm border border-slate-200 mb-8">

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="table-auto w-full">
                        <!-- Table header -->
                        <thead class="text-xs font-semibold uppercase text-slate-500 bg-slate-50 border-t border-b border-slate-200">
                            <tr>
                                <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                    <div class="font-semibold text-left">id</div>
                                </th>
                                <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                    <div class="font-semibold text-left">Название</div>
                                </th>
                            </tr>
                        </thead>
                        <!-- Table body -->
                        <tbody class="text-sm divide-y divide-slate-200">
                            <!-- Row -->    
                            <tr>
                                <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                        <div class="font-medium text-sky-500">#{{ $tag->id }}</div>
                                </td>
                                <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                        <div class="font-medium text-slate-800">{{ $tag->title }}</div>
                                </td>
                            </tr>

                        </tbody>
                    </table>

                </div>
        </div>
        

    </div>
</main>




@endsection

