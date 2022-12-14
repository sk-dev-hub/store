@extends('admin.layouts.main')

@section('content')
        
<main>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Page header -->
        <div class="sm:flex sm:justify-between sm:items-center mb-5">

            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-slate-800 font-bold">Продукт ✨</h1>
            </div>

                        <!-- Right: Actions -->
                        <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">
                       
                        <!-- Edit category button -->
                        <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white">
                            <a href="{{ route('admin.product.edit', $product->id) }}">
                                <span class="hidden xs:block">Редактировать</span>
                            </a>
                        </button>
                       
                            <!-- Delete category button -->
                        <form action="{{ route('admin.product.delete', $product->id) }}" class="btn bg-rose-500 hover:bg-rose-600 text-white cursor-pointer" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" class="hidden xs:block cursor-pointer" value="Удалить">
                        </form>    


            
                        </div>

        </div>

        <div class="bg-white">

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="table-auto w-full" @click.stop="$dispatch('set-transactionopen', true)">
                    <!-- Table header -->

                    <!-- Table body -->
                    <tbody class="text-sm divide-y divide-slate-200 border-b border-slate-200"> 
                        <tr>
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-semibold text-left">Id</div>
                            </th>
                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap md:w-1/2">
                                <div class="flex items-center">
                                    <div class="font-medium text-slate-800">{{$product->id}}</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-semibold text-left">Название</div>
                            </th>
                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap md:w-1/2">
                                <div class="flex items-center">
                                    <div class="font-medium text-slate-800">{{$product->name}}</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-semibold text-left">Описание</div>
                            </th>
                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap md:w-1/2">
                                <div class="flex items-center">
                                    <div class="font-medium text-slate-800">{{$product->description}}</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-semibold text-left">Контент</div>
                            </th>
                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap md:w-1/2">
                                <div class="flex items-center">
                                    <div class="font-medium text-slate-800">{{$product->content }}</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-semibold text-left">Категория</div>
                            </th>
                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap md:w-1/2">
                                <div class="flex items-center">
                                    <div class="font-medium text-slate-800">{{$product->category->title }}</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-semibold text-left">Колличество на складе</div>
                            </th>
                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap md:w-1/2">
                                <div class="flex items-center">
                                    <div class="font-medium text-slate-800">{{$product->count }}</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-semibold text-left">Цена</div>
                            </th>
                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap md:w-1/2">
                                <div class="flex items-center">
                                    <div class="font-medium text-slate-800">{{$product->price }}</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-semibold text-left">Старая цена</div>
                            </th>
                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap md:w-1/2">
                                <div class="flex items-center">
                                    <div class="font-medium text-slate-800">{{$product->old_price }}</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="font-semibold text-left">Изображение</div>
                            </th>
                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap md:w-1/2">
                                <div class="flex items-center">
                                    <img class="" src="{{ url('storage/' . $product->preview_img) }}" alt="Главное" width="400px">
                                </div>
                            </td>
                        </tr>


                    </tbody>
                </table>

            </div>
    </div>
        

    </div>
</main>




@endsection

