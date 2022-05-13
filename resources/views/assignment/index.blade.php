<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Assignments
            </h2>
            <a href="{{route('assignment.create')}}" class="btn btn-primary">Create Assignment</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form style="margin-bottom: 20px" method="GET" action="{{route('assignment.index')}}">
                        <input style="max-width: 20vw;" class="form-control" type="text" name="search" placeholder="Search...">
                        <button class="submit btn btn-primary"><i class='bx bx-search'></i></button>
                    </form>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th id="id"><a href="{{route('assignment.index', ['column'=>'id','direction'=>$newDirection])}}">ID<i class='order bx bx-expand-vertical'></i></a></th>
                                <th><a id="name" href="{{route('assignment.index', ['column'=>'name','direction'=>$newDirection])}}">Name<i class='order bx bx-expand-vertical'></i></a></th>
                                <th style="margin: 0;padding: 0;" id="status">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <span>Category</span>
                                        <form method="GET" action="{{route('assignment.index')}}">
                                            <select class="form-select" name="searchCategory" onchange="this.form.submit()">
                                                <option> </option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}" {{$oldCategory == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </form>
                                    </div>
                                </th>
                                <th style="margin: 0;padding: 0;" id="status">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <span>Stats</span>
                                        <form method="GET" action="{{route('assignment.index')}}">
                                            <select class="form-select" name="searchStat" onchange="this.form.submit()">
                                                <option> </option>
                                                @foreach($stats as $stat)
                                                    <option value="{{$stat->id}}" {{$oldStat == $stat->id ? 'selected' : ''}}>{{$stat->name}}</option>
                                                @endforeach
                                            </select>
                                        </form>
                                    </div>
                                </th>
                                <th style="text-align: center" colspan="3">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="container">
                            @foreach($assignments as $assignment)
                                <tr draggable="true" class="box">
                                    <td id="id">{{$assignment->id}}</td>
                                    <td>{{$assignment->name}}</td>
                                    <td id="id">{{$assignment->category->name}}</td>
                                    <td class="status">{{$assignment->stat->name}}</td>
                                    <td id="icon"><a href="{{route('assignment.show', ['assignment' => $assignment])}}"><i style="color: #21c267;" class='bx bxs-show'></i></a></td>
                                    <td id="icon"><a href="{{route('assignment.edit', ['assignment' => $assignment])}}"><i style="color: #000000;" class='bx bxs-edit'></i></a></td>
                                    <td id="icon">
                                        <form method="POST" action="{{route('assignment.destroy', ['assignment' => $assignment])}}">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit"><i style="color: #ff3c3c;" class='bx bx-trash'></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $assignments->onEachSide(5)->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {

        function handleDragStart(e) {
            this.style.opacity = '0.4';

            dragSrcEl = this;

            e.dataTransfer.effectAllowed = 'move';
            e.dataTransfer.setData('text/html', this.innerHTML);
        }

        function handleDragEnd(e) {
            this.style.opacity = '1';

            items.forEach(function (item) {
                item.classList.remove('over');
            });
        }

        function handleDragOver(e) {
            e.preventDefault();
            return false;
        }

        function handleDragEnter(e) {
            this.classList.add('over');
        }

        function handleDragLeave(e) {
            this.classList.remove('over');
        }

        function handleDrop(e) {
            e.stopPropagation();

            if (dragSrcEl !== this) {
                dragSrcEl.innerHTML = this.innerHTML;
                this.innerHTML = e.dataTransfer.getData('text/html');
            }

            return false;
        }

        let items = document.querySelectorAll('.container .box');
        items.forEach(function(item) {
            item.addEventListener('dragstart', handleDragStart);
            item.addEventListener('dragover', handleDragOver);
            item.addEventListener('dragenter', handleDragEnter);
            item.addEventListener('dragleave', handleDragLeave);
            item.addEventListener('dragend', handleDragEnd);
            item.addEventListener('drop', handleDrop);
        });
    });
</script>
<style>
    #id, #status {
        width: 100px;
        text-align: center;
    }

    #status {
        width: 250px;
    }
    i {
        font-size: 1.5rem;
    }

    #icon {
        width: 70px;
    }
    .status {
        text-align: center;
    }

    form {
        display: flex;
    }

    form .submit {
        margin-left: 20px;
    }

    form .submit i {
        margin-top: 4px;
        font-size: 1.2rem;
    }
    th, select {
        margin-bottom: 5px;
    }
    select {
        width: 39px;
        height: 35px;
        margin-left: 5px;
    }
    .box {
        cursor: move;
    }
    .box.over {
        border: 2px solid #84b0ff;
    }
    a {
        display: flex;
        justify-content: center;
        align-items: center;
        text-decoration: none;
    }
    i.order {
        font-size: 1rem;
    }
    #name {
        justify-content: flex-start;
    }
</style>
