<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <h2>Show Estudiante</h2>
    <ul>
        <li><a href="{{ route('students.create') }}">Crete Students</a></li>
        <li><a href="{{ route('students.index') }}">All Students</a></li>
    </ul>

    
        <div>
            <label for="photo">Photo: </label>
            <img src="{{ asset('uploads/' . $student->photo) }}" alt="{{ $student->name }}" width="100px">
        </div>
        <div>
            <label for="name">Name: </label>
            {{ $student->name }}
        </div>
        <div>
            <label for="email">Email: </label>
            {{ $student->email }}
        </div>
        
  
</body>
</html>