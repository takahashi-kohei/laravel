@extends('../layouts/app')

@section('content')

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>First Page</title>
</head>
<body>
  <p>{{$data["name"]}}</p>
  <p>{{$data["message"]}}</p>
  <p>現在は{{$today}}</p>
</body>
</html>

@endsection
