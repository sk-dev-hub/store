@extends('admin.layouts.main')

@section('content')
{{-- <script>
    function dropdown() {
                return {
                    options: [],
                    selected: [],
                    show: false,
                    open() { this.show = true },
                    close() { this.show = false },
                    isOpen() { return this.show === true },
                    select(index, event) {

                        if (!this.options[index].selected) {

                            this.options[index].selected = true;
                            this.options[index].element = event.target;
                            this.selected.push(index);

                        } else {
                            this.selected.splice(this.selected.lastIndexOf(index), 1);
                            this.options[index].selected = false
                        }
                    },
                    remove(index, option) {
                        this.options[option].selected = false;
                        this.selected.splice(index, 1);


                    },
                    loadOptions() {
                        const options = document.getElementById('select').options;
                        for (let i = 0; i < options.length; i++) {
                            this.options.push({
                                value: options[i].value,
                                text: options[i].innerText,
                                selected: options[i].getAttribute('selected') != null ? options[i].getAttribute('selected') : false
                            });
                        }


                    },
                    selectedValues(){
                        return this.selected.map((option)=>{
                            return this.options[option].value;
                        })
                    }
                }
            }
</script>    --}}

<main class="bg-white h-full">
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto bg-white">

        <!-- Page header -->
        <div class="mb-8">
            <h1 class="text-2xl md:text-3xl text-slate-800 font-bold">Добавить продукт ✨</h1>
        </div>

        <div class="border-t border-slate-200">

            <!-- Components -->
            <div class="space-y-8 mt-8">

                <!-- Input Types -->
                <div>
                    <div class="grid gap-5 md:grid-cols-3">
                        
                            <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="my-2 ml-3">
                                    <label class="block text-sm font-medium mb-1" for="name">Название продукта</label>
                                    <input id="name" class="form-input w-full" name="name" type="text" placeholder="Наименование" value="{{ old('name')}}">
                                    @error('name')
                                        <span class="text-xs text-rose-500">
                                        {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="my-2 ml-3">
                                    <label class="block text-sm font-medium mb-1" for="description">Описание продукта</label>
                                    <textarea id="description" class="form-input w-full" name="description" type="text" placeholder="Опиание">{{ old('description')}}</textarea>
                                    @error('description')
                                        <span class="text-xs text-rose-500">
                                        {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="my-2 ml-3">
                                    <label class="block text-sm font-medium mb-1" for="content">Контент</label>
                                    <textarea id="content" class="form-input" name="content" type="text" placeholder="Контент" cols="40" rows="10">{{ old('content')}}</textarea>
                                    @error('content')
                                        <span class="text-xs text-rose-500">
                                        {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="my-2 ml-3">
                                    <label class="block text-sm font-medium mb-1" for="price">Цена</label>
                                    <input id="price" class="form-input w-full" name="price" type="text" placeholder="Цена" value="{{ old('price')}}">
                                    @error('price')
                                        <span class="text-xs text-rose-500">
                                        {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="my-2 ml-3">
                                    <label class="block text-sm font-medium mb-1" for="old_price">Старая цена</label>
                                    <input id="old_price" class="form-input w-full" name="old_price" type="text" placeholder="Цена" value="{{ old('price')}}">
                                </div>
                                <div class="my-2 ml-3">
                                    <label class="block text-sm font-medium mb-1" for="count">Колличество на складе</label>
                                    <input id="count" class="form-input w-full" name="count" type="text" placeholder="Колличество" value="{{ old('count')}}">
                                    @error('count')
                                        <span class="text-xs text-rose-500">
                                        {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="my-2 ml-3">
                                    <label class="block text-sm font-medium mb-1" for="tags">Теги</label>
                                    <select id="tags" class="form-select" name="tags[]" multiple="multiple">
                                        <option disabled selected>Выберите теги</option>
                                            @foreach ($tags as $tag)
                                            <option 
                                                {{ is_array( old('tags')) && in_array( $tag->id, old( 'tags' ) ) ? ' selected' : ''  }}
                                                value="{{ $tag->id }}">{{ $tag->name }}</option>
                                            @endforeach
                                    </select>
                                </div>

                                {{-- <!-- sselect -->
                                <div class="my-2 ml-3">
                                <label class="block text-sm font-medium mb-1" for="tag">Поск тега</label>
                                <div class="mx-auto block text-sm font-medium mb-1"
                                    x-data="{
                                            search: '',
                                            showSelector: false,
                                            selected: {1:'Chris'},
                                            options: [],
                                            clearOpts() {
                                                this.search = '';
                                                this.showSelector = false;
                                                this.options = []
                                            },
                                            select(id, name) {
                                                this.selected[id] = name;
                                                this.clearOpts();
                                                $dispatch('selected', Object.keys(this.selected));
                                            },
                                            remove(id) {
                                                delete this.selected[id]
                                                $dispatch('selected', Object.keys(this.selected));
                                            },
                                            goSearch() {
                                                if (this.search) {
                                                    this.options = {5: 'Carl', 6: 'Alex', 7: 'Bryan'};
                                                    this.showSelector = true;
                                                } else {
                                                    this.showSelector = false;
                                                }
                                            },
                                        }">
                                        <div class="bg-white rounded-md p-2 flex gap-1 flex-wrap" @click="$refs.search_input.focus()"
                                            @click.outside="showSelector=false">
                                            <template x-for="(name, id) in selected">
                                                <div class="bg-blue-200 rounded-md flex items-center">
                                                    <div class="p-2" x-text="name"></div>
                                                    <div @click="remove(id)"
                                                        class="p-2 select-none rounded-r-md cursor-pointer hover:bg-magma-orange-clear">
                                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M12.5745 1L1 12.5745" stroke="#FEAD69" stroke-width="2" stroke-linecap="round"/>
                                                            <path d="M1.00024 1L12.5747 12.5745" stroke="#FEAD69" stroke-width="2" stroke-linecap="round"/>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </template>
                                            <div class="flex-1">
                                                <input type="text" x-model="search" x-ref="search_input"
                                                    @input.debounce.400ms="goSearch();" placeholder="Название тега"
                                                    class="form-input w-full">
                                                <div x-show="showSelector" class="absolute left-0 bg-white z-30 w-full rounded-b-md font-medium">
                                                    <div class="p-2 space-y-1">
                                                        <template x-for="(name, id) in options">
                                                            <div>
                                                                <template x-if="!selected[id]">
                                                                    <div @click="select(id, name)"
                                                                        class="bg-blue-200 border-2 border-blue-200 cursor-pointer rounded-md p-2 hover:border-light-blue-1"
                                                                        x-text="name"></div>
                                                                </template>
                                                            </div>
                                                        </template>
                                                        <template x-if="options.length === 0">
                                                            <div class="text-gray-500">
                                                                No result
                                                            </div>
                                                        </template>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div> --}}

                                {{-- <div class="my-2 ml-3">
                                    <select id="select2" name="select2[]" class="hidden" multiple>
                                        <option value="above">Above</option>
                                        <option value="after">After</option>
                                        <option value="back" selected>Back</option>
                                        <option value="behind" selected>Behind</option>
                                        <option value="before" selected>Before</option>
                                        <option value="beyond" selected>Beyond</option>
                                        <option value="forward">Forward</option>
                                        <option value="front">Front</option>
                                        <option value="later">Later</option>
                                        <option value="under">Under</option>
                                    </select>
                                    
                                    <div class="relative flex" x-data="{ ...selectMultiple('select2') }">
                                    
                                        <!-- Selected -->
                                        <div class="bg-blue-100 inline-flex items-center text-sm rounded mt-2 mr-1 overflow-hidden"
                                            @click="isOpen = true;"
                                            @keydown.arrow-down.prevent="if(dropdown.length > 0) document.getElementById(elSelect.id+'_'+dropdown[0].index).focus();">
                                    
                                            <template x-for="(option,index) in selected;" :key="option.value">
                                                <p class="m-1 self-center p-2 text-xs whitespace-nowrap rounded-3xl bg-teal-200 cursor-pointer hover:bg-red-300"
                                                    x-text="option.text"
                                                    @click="toggle(option)">
                                                </p>
                                            </template>
                                    
                                            <input type="text" placeholder="Выберите тег" class="form-select"
                                                x-model="term"
                                                x-ref="input" />
                                        </div>
                                    
                                        <!-- Dropdown -->
                                        <div class="form-select"
                                            x-show="isOpen"
                                            @mousedown.away="isOpen = false">
                                    
                                            <template x-for="(option,index) in dropdown" :key="option.value">
                                                <div class="cursor-pointer hover:bg-teal-200 focus:bg-teal-300 focus:outline-none"
                                                    :class="(term.length > 0 && !option.text.toLowerCase().includes(term.toLowerCase())) && 'hidden';"
                                                    x-init="$el.id = elSelect.id + '_' + option.index; $el.tabIndex = option.index;"
                                                    @click="toggle(option)"
                                                    @keydown.enter.prevent="toggle(option);"
                                                    @keydown.arrow-up.prevent="if ($el.previousElementSibling != null) $el.previousElementSibling.focus();"
                                                    @keydown.arrow-down.prevent="if ($el.nextElementSibling != null) $el.nextElementSibling.focus();">
                                    
                                                    <p class="p-2"
                                                       x-text="option.text"></p>
                                                </div>
                                            </template>
                                        </div>
                                    </div>
                                    
                                    <script>
                                        document.addEventListener('alpine:init', () => {
                                            Alpine.data('selectMultiple', (elSelectId) => ({
                                    
                                                elSelect: document.getElementById(elSelectId),
                                                isOpen: false,
                                                term: '',
                                    
                                                selected: [],
                                                dropdown: [],
                                    
                                                // in the <select> element, set the attributes :
                                                //  "multiple" to avoid to Always set "selected" to the first item
                                                //  class="hidden" (better than hide it with javascript which has a slow reaction)
                                                init()
                                                {
                                                    for(var index=0; index < this.elSelect.options.length; index++)
                                                    {
                                                        if (this.elSelect.options[index].selected)
                                                            this.selected.push(this.elSelect.options[index]);
                                                        else
                                                            this.dropdown.push(this.elSelect.options[index]);
                                                    }
                                                },
                                    
                                                toggle(option)
                                                {
                                                    var property1 = (option.selected == true) ? 'dropdown' : 'selected';
                                                    var property2 = (option.selected == true) ? 'selected' : 'dropdown';
                                    
                                                    option.selected = !option.selected;
                                    
                                                    // add
                                                    this[property1].push(option);
                                    
                                                    // remove
                                                    this[property2] = this[property2].filter((opt, index)=>{
                                                        return opt.value != option.value;
                                                    });
                                                    
                                                    // reorder this.dropdown to their original select.options indexes
                                                    if (property1 == 'dropdown')
                                                        this.dropdown.sort((opt1, opt2) => (opt1.index > opt2.index) ? 1 : -1)
                                    
                                                    // after adding, re-focus the input
                                                    if (option.selected)
                                                        this.$refs.input.focus();
                                                },
                                            }))
                                        });
                                    </script>
                                </div> --}}

                                <div class="my-2 ml-3">
                                    <label class="block text-sm font-medium mb-1" for="colors">Цвет</label>
                                    <select id="colors" class="form-select" name="colors[]" multiple="multiple">
                                        <option disabled selected>Выберите цвет</option>
                                            @foreach ($colors as $color)
                                        <option {{ is_array( old('colors')) && in_array( $color->id, old( 'colors' ) ) ? ' selected' : ''  }}
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
                                                    {{ $category->id == old('category_id') ? 'selected' : '' }}
                                                    >{{ $category->title }}
                                                </option>
                                            @endforeach
                                    </select>
                                </div>

                                <div class="my-2 ml-3">
                                    <label class="block text-sm font-medium mb-1" for="group">Группа</label>
                                    <select id="group" class="form-select" name="group_id">
                                        <option disabled selected>Выберите категорию</option>
                                            @foreach ($groups as $group)
                                                <option value="{{ $group->id }}"
                                                    {{ $group->id == old('group') ? 'selected' : '' }}
                                                    >{{ $group->title }}
                                                </option>
                                            @endforeach
                                    </select>
                                </div>

                                <div class="my-2 ml-3">
                                    <label class="block text-sm font-medium mb-1" for="preview_img">Превью изображение</label>
                                    
                                        <label class="w-64 flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-indigo cursor-pointer hover:bg-indigo-500 hover:text-white">
                                            <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                            </svg>
                                            <span class="mt-2 text-base leading-normal">Выберите файл</span>
                                            <input id="preview_img" type='file' class="hidden" name="preview_img" />
                                        </label>
                                </div>

                                <div class="my-2 ml-3">
                                    <label class="block text-sm font-medium mb-1" for="product_images[]">Изображние товара 1</label>       
                                    <input id="product_images[]" class="form-input w-full" type="file" name="product_images[]">
                                </div>

                                <div class="my-2 ml-3">
                                    <label class="block text-sm font-medium mb-1" for="product_images[]">Изображние товара 2</label>       
                                    <input id="product_images[]" class="form-input w-full" type="file" name="product_images[]">
                                </div>

                                <div class="my-2 ml-3">
                                    <label class="block text-sm font-medium mb-1" for="product_images[]">Изображние товара 3</label>       
                                    <input id="product_images[]" class="form-input w-full" type="file" name="product_images[]">
                                </div>

                                <div class="my-2 ml-3">
                                    <input type="submit" value="Добавить" class="mt-3 btn bg-indigo-500 hover:bg-indigo-600 text-white">
                                </div>
                            </form>
                        
                    </div>
                </div>

            </div>

        </div>

    </div>
</main>




@endsection

