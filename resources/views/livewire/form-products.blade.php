
<main>

    <section class="container">
        <div class="row pt-5 ">
            <div class="col-12 pt-5">
                <h1 class="t-b mb-4 mt-4">{{ __('ui.addNewAds') }}</h1>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <main class="container sfondoCreate min-vh-100">
        <section class="row w-100">
            <div class="col-12 p-4 bg-transparent pb-5 shadow-lg form rounded-5 mt-4 col-md-7 mt-3">

                <form wire:submit.prevent="store">
                    <div class="mb-3">
                        <label for="name" class="form-label fs-5 t-b">{{ __('ui.name') }}</label>
                        <input type="text" class="form-control" id="name" name="name" wire:model='name'>
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label fs-5 t-b">{{ __('ui.description') }}</label>
                        <textarea name="description" class="form-control" id="description" cols="30" rows="5"
                            wire:model='description'></textarea>
                        @error('description')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label fs-5 t-b">{{ __('ui.categoryLabel') }}</label>
                        <select class="form-select" aria-label="Default select example" name="category"
                            wire:model.defer='category' id="category">
                            <option>Seleziona Categoria</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ __("ui.$category->name") }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="condition" class="form-label fs-5 t-b">{{ __('ui.condionLabel') }}</label>
                        <select class="form-select" aria-label="Default select example" name="condition"
                            wire:model.defer='condition' id="condition">
                            <option>Condizione oggetto</option>
                            @foreach ($conditions as $condition)
                                <option value="{{ $condition->id }}">{{ __("ui.$condition->name") }}</option>
                            @endforeach
                        </select>
                        @error('condition')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3 input-group">
                        <label for="price" class="form-label"></label>
                        <span class="input-group-text fw-semibold" id="basic-addon1">€</span>
                        <input type="text" class="inputCustom" id="price" name="price" wire:model='price'>
                        @error('price')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input wire:model="temporary_images" type="file" class="form-control shadow" name="images"
                            multiple placeholder="Img" />
                        @error('temporary_images.*')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    @if (!empty($images))
                        <div class="row">
                            <div class="col-12">
                                <p>Anteprima foto:</p>
                                <div class="row border border-4 border-info rounded shadow py-4">
                                    @foreach ($images as $key => $image)
                                        <div class="col my-3">
                                            <div class="img-preview mx-auto shadow rounded"
                                                style="background-image: url({{ $image->temporaryUrl() }});"></div>
                                            <button
                                                class="btn btn-danger shadow d-block text-center rounded-5 mt-2 mx-auto"
                                                type="button"
                                                wire:click="removeImage({{ $key }})">{{ __('ui.cancelButton') }}</button>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    @endif
                    <div class="text-end">
                        <button class="btn btnOrange bg-o mt-2 text-white rounded-5"
                        type="submit">{{ __('ui.createAds') }}</button>
                    </div>
                 
                </form>
            </div>
        </section>
    </main>


</main>