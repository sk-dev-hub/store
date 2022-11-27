@extends('admin.layouts.main')

@section('content')
        
        <main>
            <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

                <!-- Welcome banner -->
                <div class="relative bg-indigo-200 p-4 sm:p-6 rounded-sm overflow-hidden mb-8">

                    <!-- Background illustration -->
                    <div class="absolute right-0 top-0 -mt-4 mr-16 pointer-events-none hidden xl:block" aria-hidden="true">
                        <svg width="319" height="198" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <defs>
                                <path id="welcome-a" d="M64 0l64 128-64-20-64 20z" />
                                <path id="welcome-e" d="M40 0l40 80-40-12.5L0 80z" />
                                <path id="welcome-g" d="M40 0l40 80-40-12.5L0 80z" />
                                <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="welcome-b">
                                    <stop stop-color="#A5B4FC" offset="0%" />
                                    <stop stop-color="#818CF8" offset="100%" />
                                </linearGradient>
                                <linearGradient x1="50%" y1="24.537%" x2="50%" y2="100%" id="welcome-c">
                                    <stop stop-color="#4338CA" offset="0%" />
                                    <stop stop-color="#6366F1" stop-opacity="0" offset="100%" />
                                </linearGradient>
                            </defs>
                            <g fill="none" fill-rule="evenodd">
                                <g transform="rotate(64 36.592 105.604)">
                                    <mask id="welcome-d" fill="#fff">
                                        <use xlink:href="#welcome-a" />
                                    </mask>
                                    <use fill="url(#welcome-b)" xlink:href="#welcome-a" />
                                    <path fill="url(#welcome-c)" mask="url(#welcome-d)" d="M64-24h80v152H64z" />
                                </g>
                                <g transform="rotate(-51 91.324 -105.372)">
                                    <mask id="welcome-f" fill="#fff">
                                        <use xlink:href="#welcome-e" />
                                    </mask>
                                    <use fill="url(#welcome-b)" xlink:href="#welcome-e" />
                                    <path fill="url(#welcome-c)" mask="url(#welcome-f)" d="M40.333-15.147h50v95h-50z" />
                                </g>
                                <g transform="rotate(44 61.546 392.623)">
                                    <mask id="welcome-h" fill="#fff">
                                        <use xlink:href="#welcome-g" />
                                    </mask>
                                    <use fill="url(#welcome-b)" xlink:href="#welcome-g" />
                                    <path fill="url(#welcome-c)" mask="url(#welcome-h)" d="M40.333-15.147h50v95h-50z" />
                                </g>
                            </g>
                        </svg>
                    </div>

                    <!-- Content -->
                    <div class="relative">
                        <h1 class="text-2xl md:text-3xl text-slate-800 font-bold mb-1">Добро пожаловать в Админ Панель FlashPrint 👋</h1>
                        <p>Ты сделаешь этот проект!</p>
                    </div>
                </div>

                <!-- Cards -->
                <div class="grid grid-cols-12 gap-6">

                    <div class="flex flex-col col-span-full sm:col-span-6 xl:col-span-3 bg-white shadow-lg rounded-sm border border-slate-200">
                        <div class="px-5 pt-5 pb-5">
                            <header>
                                <h3 class="text-sm font-semibold text-slate-500 uppercase mb-1">Заказы</h3>
                                <div class="text-2xl font-bold text-slate-800 mb-1">1000</div>
                                <div class="text-sm"><span class="font-medium text-emerald-500">+33 (4,7%)</span> - Сегодня</div>
                            </header>
                            <button class="btn w-full mt-3 border-slate-200 hover:border-slate-300 text-indigo-500">Подробнее</button>
                        </div>

                    </div>


                    <div class="flex flex-col col-span-full sm:col-span-6 xl:col-span-3 bg-white shadow-lg rounded-sm border border-slate-200">
                        <div class="px-5 pt-5">
                            <header>
                                <h3 class="text-sm font-semibold text-slate-500 uppercase mb-1">Продукты</h3>
                                <div class="text-2xl font-bold text-slate-800 mb-1">200</div>
                                <div class="text-sm"><span class="font-medium text-emerald-500">+142 (3,7%)</span> - Сегодня</div>
                            </header>
                            <button class="btn w-full mt-3 border-slate-200 hover:border-slate-300 text-indigo-500">Подробнее</button>
                        </div>
                    </div>

                    <div class="flex flex-col col-span-full sm:col-span-6 xl:col-span-3 bg-white shadow-lg rounded-sm border border-slate-200">
                        <div class="px-5 pt-5">
                            <header>
                                <h3 class="text-xs font-semibold text-slate-500 uppercase mb-1">Пользователи</h3>
                                <div class="text-2xl font-bold text-slate-800 mb-1">1102</div>
                                <div class="text-sm"><span class="font-medium text-emerald-500">+5 (9,2%)</span> - Сегодня</div>
                            </header>
                            <button class="btn w-full mt-3 border-slate-200 hover:border-slate-300 text-indigo-500">Подробнее</button>
                        </div>
                    </div>

                    <div class="flex flex-col col-span-full sm:col-span-6 xl:col-span-3 bg-white shadow-lg rounded-sm border border-slate-200">
                        <div class="px-5 pt-5">
                            <header>
                                <h3 class="text-sm font-semibold text-slate-500 uppercase mb-1">Отзывы</h3>
                                <div class="text-2xl font-bold text-slate-800 mb-1">328</div>
                                <div class="text-sm"><span class="font-medium text-emerald-500">+3 (4%)</span> - Сегодня</div>
                            </header>
                            <button class="btn w-full mt-3 border-slate-200 hover:border-slate-300 text-indigo-500">Подробнее</button>
                        </div>
                    </div>

                </div>

            </div>
        </main>




@endsection

