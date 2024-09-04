<!DOCTYPE html>
<html>
<head>
    <title>Email</title>
</head>
<body>
    @php
        $isEmail = $data['ISeMAIL'] ?? 0
    @endphp
    <h1>{{ $data['subject'] }}</h1>
    <p>{{ $data['message'] }}</p>

    @if ($isEmail)
        <a href="{{ $data['url'] }}">{{ $data['urltext'] }}</a>
    @endif
    
</body>
</html>