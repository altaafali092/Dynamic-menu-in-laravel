@extends('layouts.master')

@section('content')

    <a href="{{ route('menu.index') }}" class="uk-button uk-margin uk-button-danger">back</a>
    <form class="uk-margin-small-top" action="{{ route('menu.update',$menu) }}" method="POST">
        @csrf
        @method('PUT')

        <fieldset class="uk-fieldset">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <legend class="uk-legend">Create Menu</legend>

            <div class="=uk-margin uk-child-width-expand@s" uk-grid>
                <div class="uk-grid-item-match">
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-text">Menu Name</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="form-stacked-text" name="name" type="text"
                                value="{{ old('name', $menu->name) }}">
                        </div>
                    </div>
                </div>
                <div class="uk-grid-item-match">
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-text">Url</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" name="url" id="form-stacked-text" type="text"
                                valu="{{ old('url', $menu->old) }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="=uk-margin uk-child-width-expand@s" uk-grid>
                <div class="uk-grid-item-match">
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-horizontal-select"> Parent Menu (optional)</label>
                        <div class="uk-form-controls">
                            <select class="uk-select" name="parent_id" id="form-horizontal-select">
                                <option value="">None (Top-Level Menu)</option>
                                @foreach ($menuTree as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id == $menu->parent_id ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach

                            </select>
                            @error('parent_id')
                                <span class="uk-text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>




            </div>
            <button type="submit" class="uk-button uk-margin uk-button-danger">Submit</button>

        </fieldset>
    </form>
@endsection
