<h1>data list</h1>
@foreach($data as $item)
  <span><h3>{{$item['title']}}</h3></span>
  <span>{{$item['body']}}</span>
@endforeach
