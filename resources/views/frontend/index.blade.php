<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Basic Table</h2>
  <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>     
  <form>
    <input type="search" name="search" value="{{$search}}">
    <button class="btn btn-default">Search</button>
<a href="{{url('/')}}">
    <button class="btn btn-default" type="button">Reset</button>
  </a>
  </form>       
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>image</th>
        <th>action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($contact as $c)
      <tr>
        <td>{{$c->name}}</td>
        <td>{{$c->phone}}</td>
        <td>{{$c->email}}</td>
        <td><img src="{{url('/')}}/images/{{$c->image}}" style="    width: 15%;"></td>
        <td><a href="{{url('/')}}/edit/{{$c->id}}" class="btn btn-default">Edit</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="row">
  {{ $contact->links() }}
</div>
</div>


</body>
</html>
