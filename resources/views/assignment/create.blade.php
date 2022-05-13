<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Assignment
            </h2>
            <a href="{{route('assignment.index')}}" class="btn btn-primary">Turn back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{route('assignment.store')}}">
                        @csrf
                        @if($errors->has('name'))
                            <span class="form-error">{{$errors->first('name')}}</span>
                            <style>.name{background-color:#5e17c2;color:#ffffff;}</style>
                        @endif
                        <div>
                            <div class="input-group mb-3">
                                <span class="label name input-group-text" id="basic-addon1">Name</span>
                                <input type="text" class="form-control" name="name" value="{{$assignment->name ?? old('name')}}" placeholder="Name">
                            </div>
                        </div>
                        @if($errors->has('description'))
                            <span class="form-error">{{$errors->first('description')}}</span>
                            <style>.description{background-color:#5e17c2;color:#ffffff;}</style>
                        @endif
                        <div>
                            <div class="input-group mb-3">
                                <span class="label description input-group-text" id="basic-addon1">Description</span>
                                <input type="text" class="form-control" name="description" value="{{$assignment->description ?? old('description')}}" placeholder="Description">
                            </div>
                        </div>
                        @if($errors->has('stat_id'))
                            <span class="form-error">{{$errors->first('stat_id')}}</span>
                            <style>.stat{background-color:#5e17c2;color:#ffffff;}</style>
                        @endif
                        <div>
                            <div class="input-group mb-3">
                                <span class="label stat input-group-text" id="basic-addon1">Stat</span>
                                <select class="form-select" name="stat_id">
                                    <option> </option>
                                    @foreach($stats as $stat)
                                        <option value="{{$stat->id}}" {{ ($assignment->stat_id ?? old('stat_id')) == $stat->id ? 'selected' : ''}}>
                                            {{$stat->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @if($errors->has('category_id'))
                            <span class="form-error">{{$errors->first('category_id')}}</span>
                            <style>.category{background-color:#5e17c2;color:#ffffff;}</style>
                        @endif
                        <div>
                            <div class="input-group mb-3">
                                <span class="label category input-group-text" id="basic-addon1">Category</span>
                                <select class="form-select" name="category_id">
                                    <option> </option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{ ($assignment->category_id ?? old('category_id')) == $category->id ? 'selected' : ''}}>
                                            {{$category->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div style="width:100%" class="d-flex justify-content-end">
                            <button class="btn btn-primary" type="submit">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    .form-error {
        color: #5e17c2;
        font-size: 1rem;
    }
    .label {
        width: 120px;
    }
</style>
