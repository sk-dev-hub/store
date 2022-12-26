@extends('admin.layouts.main')

@section('content')
        
<main class="bg-white h-full">
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto bg-white ">

        <!-- Page header -->
        <div class="mb-8">
            <h1 class="text-2xl md:text-3xl text-slate-800 font-bold">Редактировать продукт: {{ $product->name }} ✨</h1>
        </div>

        <div class="border-t border-slate-200">

            <!-- Components -->
            <div class="space-y-8 mt-8">

                <!-- Input Types -->
                <div>
                    <div class="grid gap-5 md:grid-cols-3">
                        
                            <form action="{{ route('admin.product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="my-2 ml-3">
                                    <label class="block text-sm font-medium mb-1" for="name">Название продукта</label>
                                    <input id="name" class="form-input w-full" name="name" type="text" placeholder="Наименование" value="{{ $product->name }}">
                                </div>
                                <div class="my-2 ml-3">
                                    <label class="block text-sm font-medium mb-1" for="description">Описание продукта</label>
                                    <textarea id="description" class="form-input w-full" name="description" type="text" placeholder="Опиание">{{ $product->description }}</textarea>
                                </div>
                                <div class="my-2 ml-3">
                                    <label class="block text-sm font-medium mb-1" for="content">Контент</label>
                                    <textarea id="content" class="form-input" name="content" type="text" placeholder="Контент" cols="40" rows="10">{{ $product->content }}</textarea>
                                </div>
                                <div class="my-2 ml-3">
                                    <label class="block text-sm font-medium mb-1" for="price">Цена</label>
                                    <input id="price" class="form-input w-full" name="price" type="text" placeholder="Цена" value="{{ $product->price }}">
                                </div>
                                <div class="my-2 ml-3">
                                    <label class="block text-sm font-medium mb-1" for="old_price">Старая цена</label>
                                    <input id="old_price" class="form-input w-full" name="old_price" type="text" placeholder="Цена" value="{{ old('price')}}">
                                </div>
                                <div class="my-2 ml-3">
                                    <label class="block text-sm font-medium mb-1" for="count">Колличество на складе</label>
                                    <input id="count" class="form-input w-full" name="count" type="text" placeholder="Колличество" value="{{ $product->count }}">
                                </div>
                                <div class="my-2 ml-3">
                                    <label class="block text-sm font-medium mb-1" for="tags">Теги</label>
                                    <select id="tags" class="form-select" name="tags[]" multiple="multiple">
                                        <option disabled selected>Выберите теги</option>
                                            @foreach ($tags as $tag)
                                                <option 
                                                    {{ is_array( $product->tags->pluck('id')->toArray() ) && in_array( $tag->id, $product->tags->pluck('id')->toArray() ) ? ' selected' : ''  }}
                                                    value="{{ $tag->id }}">{{ $tag->name }}
                                                </option>
                                            @endforeach
                                    </select>
                                </div>

                                <div class="my-2 ml-3">
                                    <label class="block text-sm font-medium mb-1" for="colors">Цвет</label>
                                    <select id="colors" class="form-select" name="colors[]" multiple="multiple">
                                        <option disabled selected>Выберите цвет</option>
                                            @foreach ($colors as $color)
                                                <option 
                                                    {{ is_array( $product->colors->pluck('id')->toArray() ) && in_array( $color->id, $product->colors->pluck('id')->toArray() ) ? ' selected' : ''  }}
                                                    value="{{ $color->id }}" style="color: {{ $color->name }}">
                                                        {{ $color->name }} 
                                                </option>
                                            @endforeach
                                    </select>
                                </div>

                                <div class="my-2 ml-3">
                                    <label class="block text-sm font-medium mb-1" for="category">Категория</label>
                                    <select id="category" class="form-select" name="category_id">
                                        <option disabled selected>Выберите категорию</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $category->id == $product->category_id ? 'selected' : '' }}
                                                    >{{ $category->title }}
                                                </option>
                                            @endforeach
                                    </select>
                                </div>

                                <div class="my-2 ml-3">
                                    <label class="block text-sm font-medium mb-1" for="group">Группа</label>
                                    <select id="group" class="form-select" name="group_id">
                                        <option disabled selected>Выберите группу</option>
                                            @foreach ($groups as $group)
                                                <option value="{{ $group->id }}"
                                                    {{ $group->id == $product->group_id ? 'selected' : '' }}
                                                    >{{ $group->title }}
                                                </option>
                                            @endforeach
                                    </select>
                                </div>

                                <div class="my-2 ml-3">
                                    <label class="block text-sm font-medium mb-1" for="preview_img">Превью изображения</label>
                                        <div>
                                            <img class="mt-7" src="{{ url('storage/' . $product->preview_img) }}" alt="Главное" width="200px">
                                        </div>
                                            <label class="w-64 mt-3 flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-indigo cursor-pointer hover:bg-indigo-500 hover:text-white">
                                                <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                                </svg>
                                                <span class="mt-2 text-base leading-normal">Выберите файл</span>
                                                <input id="preview_img" type='file' class="hidden" name="preview_img" />
                                            </label> 
                                </div>

                                <input type="submit" value="Изменить" class="mt-3 btn bg-indigo-500 hover:bg-indigo-600 text-white">
                            </form>
                        
                    </div>
                </div>

            </div>

        </div>

    </div>
</main>




@endsection

