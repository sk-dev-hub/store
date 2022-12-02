@extends('admin.layouts.main')

@section('content')
        
<main class="h-full">
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto bg-white">

        <!-- Page header -->
        <div class="mb-8">
            <h1 class="text-2xl md:text-3xl text-slate-800 font-bold">Создать пользователя ✨</h1>
        </div>

        <div class="border-t border-slate-200">

            <!-- Components -->
            <div class="space-y-8 mt-8">

                <!-- Input Types -->
                <div>
                    <div class="grid gap-5 md:grid-cols-3">
                        
                            <form action="{{ route('admin.user.store') }}" method="post">
                                @csrf
                                <div class="my-2 ml-3">
                                    <label class="block text-sm font-medium mb-1" for="name">Имя</label>
                                    <input id="name" class="form-input w-full" name="name" type="text" placeholder="Имя" value="{{ old('name') }}">
                                </div>
                        
                                <div class="my-2 ml-3">
                                    <label class="block text-sm font-medium mb-1" for="email">Email</label>
                                    <input id="email" class="form-input w-full" name="email" type="email" placeholder="Email" value="{{ old('email') }}">
                                </div>
                                
                                <div class="my-2 ml-3">
                                    <label class="block text-sm font-medium mb-1" for="password">Пароль</label>
                                    <input id="password" class="form-input w-full" name="password" type="password" placeholder="Пароль" value="{{ old('password') }}">
                                </div>
                                
                                <div class="my-2 ml-3">
                                    <label class="block text-sm font-medium mb-1" for="password">Повторите пароль</label>
                                    <input id="password" class="form-input w-full" name="password_confirmation" type="password" placeholder="Пароль" value="{{ old('password_confirmation') }}">
                                </div>
                                
                                <div class="my-2 ml-3">
                                    <label class="block text-sm font-medium mb-1" for="surname">Фамилия</label>
                                    <input id="surname" class="form-input w-full" name="surname" type="text" placeholder="Фамилия" value="{{ old('surname') }}">
                                </div>
                                
                                <div class="my-2 ml-3">
                                    <label class="block text-sm font-medium mb-1" for="patronymic">Отчество</label>
                                    <input id="patronymic" class="form-input w-full" name="patronymic" type="text" placeholder="Отчество" value="{{ old('patronymic') }}">
                                </div>
                                
                                <div class="my-2 ml-3">
                                    <label class="block text-sm font-medium mb-1" for="age">Возраст</label>
                                    <input id="age" class="form-input w-full" name="age" type="text" placeholder="Возраст" value="{{ old('age') }}">
                                </div>
                                
                                <div class="my-2 ml-3">
                                    <label class="block text-sm font-medium mb-1" for="address">Адрес</label>
                                    <input id="address" class="form-input w-full" name="address" type="text" placeholder="Адрес" value="{{ old('address') }}">
                                </div>
                                
                                <div class="my-2 ml-3">
                                    <label class="block text-sm font-medium mb-1" for="gender">Пол</label>
                                    <select id="gender" class="form-select" name="gender">
                                        <option disabled selected>Пол</option>
                                        <option {{ old('gender') == 1 ? ' selected' : '' }} value="1" >Мужской</option>
                                        <option {{ old('gender') == 2 ? ' selected' : '' }} value="2" >Женский</option>
                                    </select>
                                </div>
                             

                                <div class="my-2 ml-3">
                                    <input type="submit" value="Создать" class="mt-3 btn bg-indigo-500 hover:bg-indigo-600 text-white">
                                </div>
                                
                            </form>
                        
                    </div>
                </div>

            </div>

        </div>

    </div>
</main>




@endsection

