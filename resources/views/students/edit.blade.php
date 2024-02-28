<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <h2>Editar Estudiante</h2>
    <ul>
        <li><a href="{{ route('students.create') }}">Crete Students</a></li>
        <li><a href="{{ route('students.index') }}">All Students</a></li>
    </ul>

    <form action="{{ route('students.update', $student->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="photo">Actual Photo: </label>
            <img src="{{ asset('uploads/'.$student->photo) }}" alt="" style="width: 100px;">
        </div>

        <div>
            <label for="photo">Cambiar Photo: </label>
            <input type="file" name="photo" id="photo">
        </div>


        <div>
            <label for="name">Name: </label>
            <input type="text" name="name" id="name" value="{{ $student->name }}">
        </div>
        <div>
            <label for="email">Email: </label>
            <input type="email" name="email" id="email" value="{{ $student->email }}">
        </div>
        <div>
            <button type="submit">Actualizar</button>
        </div>
    </form>
</body>
</html>