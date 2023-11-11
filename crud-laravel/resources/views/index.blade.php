@extends('layouts.base')

@section('content')

{{-- Añadiendo los botones de excel, pdf y copiar tabla --}}

<header>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</header>

{{-- Fin --}}

<body>
    <div class="row">
        <div class="col-12">
            <div>
                <h2 class="text-white">CRUD de Tareas</h2>
            </div>
            <div>
                <a href="{{route('tasks.create')}}" class="btn btn-light">Crear tarea</a>
            </div>
        </div>

        @if (Session::get('success'))

                <div class="alert alert-success mt-2">
                    <strong>{{Session::get('success')}}</strong><br>
                </div>

        @endif

        <div class="col-12 mt-4">

            {{-- Añadiendo los botones de funcionalidades --}}
            <div class="grid text-center">
                <button id="btn-exportar-pdf" class="btn btn-primary btn-lg" onclick="generarPDF()"> Exportar a PDF  <i class="far fa-file-pdf"></i></button>
                <button id="btn-exportar-excel" class="btn btn-success btn-lg" onclick="exportarTablaAExcel()"> Exportar a Excel  <i class="far fa-file-excel"></i></button>
                <button id="btn-copiar-tabla" class="btn btn-secondary btn-lg" onclick="copiarTablaAlPortapapeles()"> Copiar Tabla  <i class="far fa-copy"></i></button>
            </div>
            {{-- Fin --}}

            <table class="table table-bordered text-white">
                <tr class="text-secondary">
                    <th>Tarea</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>
                @foreach ($tasks as $task)

                    <tr>
                        <td class="fw-bold">{{$task->title}}</td>
                        <td>{{$task->description}}</td>
                        <td>
                            {{$task->due_date}}
                        </td>
                        <td>
                            <span class="badge bg-warning fs-6">{{$task->status}}</span>
                        </td>
                        <td>
                            <a href="{{route('tasks.edit', $task)}}" class="btn btn-warning">Editar</a>

                            <form action="{{route('tasks.destroy', $task)}}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{-- para el paginador --}}
            {{$tasks->links()}}
        </div>
    </div>
    @endsection

    {{-- Añadiendo los recursos para las funcionalidades --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.core.min.js" integrity="sha512-UhlYw//T419BPq/emC5xSZzkjjreRfN3426517rfsg/XIEC02ggQBb680V0VvP+zaDZ78zqse3rqnnI5EJ6rxA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- font awsome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>

    <script src="{{ asset('main.js') }}"></script>
    {{-- Fin --}}
</body>
