@extends('admin.layouts.main')

@section('content')
        
<main class="bg-white h-full">
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto ">

        <!-- Page header -->
        <div class="mb-8">
            <h1 class="text-2xl md:text-3xl text-slate-800 font-bold">Создать тег ✨</h1>
        </div>

        <div class="border-t border-slate-200">

            <!-- Components -->
            <div class="space-y-8 mt-8">

                <!-- Input Types -->
                <div>
                    <div class="grid gap-5 md:grid-cols-3">
                        
                            <form action="{{ route('admin.tag.store') }}" method="post">
                                @csrf
                                <label class="block text-sm font-medium mb-1" for="tag">Название тега</label>
                                <input id="tag" class="form-input w-full" name="name" type="text" placeholder="Наименование">
                               
                                <input type="submit" value="Добавить" class="mt-3 btn bg-indigo-500 hover:bg-indigo-600 text-white">
                            </form>
                        
                    </div>
                </div>

            </div>

        </div>

    </div>
</main>




@endsection

