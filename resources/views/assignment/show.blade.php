<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{$assignment->name}}
            </h2>
            <a href="{{route('assignment.index')}}" class="btn btn-primary">Turn back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <td id="id">{{$assignment->id}}</td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>{{$assignment->name}}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{$assignment->description}}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td id="status">{{$assignment->stat->name}}</td>
                            </tr>
                            <tr>
                                <th>Category</th>
                                <td id="status">{{$assignment->category->name}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="actions">
                        <a href="{{route('assignment.edit', ['assignment' => $assignment])}}" class="btn btn-primary">Update</a>
                        <form method="POST" action="{{route('assignment.destroy', ['assignment' => $assignment])}}">
                            @method('DELETE')
                            @csrf
                            <button  class="btn btn-primary" type="submit"><a>Delete</a></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    th {
        width: 130px;
        border-right: 1px solid #000;
    }
    .actions {
        display: flex;
        justify-content: flex-end;
    }
    i {
        font-size: 2rem;
    }
    a {
        margin: 0 10px;
    }
</style>
