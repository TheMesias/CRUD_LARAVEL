<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <h2>Estudiantes</h2>
    <ul>
        <li><a href="{{ route('students.create') }}">Crete Student</a></li>
        <li><a href="{{ route('students.index') }}">All Students</a></li>
    </ul>

    @foreach ($students as $student)
        <img src="{{ asset('uploads/' . $student->photo) }}" alt="{{ $student->name }}" width="100px">
        <p>{{ $student->name }}</p>
        <p>{{ $student->email }}</p>
        <a href="{{ route('students.show', $student->id) }}">Detail</a>
        <a href="{{ route('students.edit', $student->id) }}">Edit</a>
        <form action="{{ route('students.destroy', $student->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
        <br>
    @endforeach
</body>
</html>