<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('esewaPay')}}" method="post">
        @csrf
        <input type="hidden" name="sid" value="{{Auth::guard('student')->user()->id}}">
        <input type="hidden" name="name" value="{{Auth::guard('student')->user()->name}}">
        <input type="hidden" name="email" value="{{Auth::guard('student')->user()->email}}">
        <input type="hidden" name="pid" value="455654.0">
        <input type="hidden" name="amount" value="{{$price}}">
        <input type="hidden" name="status" value="failed">
        <input type="hidden" name="floor" value="{{$floor}}">   
        <input type="submit" value="Pay With Esewa">
    </form>
   
</body>   
</html>