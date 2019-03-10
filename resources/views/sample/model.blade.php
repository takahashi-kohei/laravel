<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>model sample</title>
</head>
<body>
  <ul>
    @foreach($data as $d)
      <li>{{$d->name}}</li>
    @endforeach
  </ul>
</body>
</html>