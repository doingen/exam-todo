<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/sample.css">
  <link rel="stylesheet" type="text/css" href="css/reset.css">
  <title>COACHTECH</title>
</head>
<body>

  <div class="main">
    <div class="container">
      <h2 class="container__title">Todo List</h2>
      @if (count($errors) > 0)
      <ul>
        @foreach ($errors->all() as $error)
        <li>
          {{$error}}
        </li>
        @endforeach
      </ul>
      @endif
      <div class="inner">
        <form class="inner__addform" action="/todo/create" method="post">
          @csrf
          <input class="add-contents" type="text" name="content">
          <button class="button add-button" type="submit">追加 </button>
        </form>
      </div>
      <div class="inner__added">
        <table>
          <tr>
            <th>作成日</th>
            <th>タスク名</th>
            <th>更新</th>
            <th>削除</th>
          </tr> 
          @if($items->user_id === $user->id)
            @foreach($items as $item)
            <tr>
              <td>{{$item->created_at}}</td>
              <form action="{{ route('todo.update', ['id' => $item->id]) }}" method="post">
                @csrf
                <td>
                  <input class="table-contents" type="text" name="content" value="{{$item->content}}">            
                </td>
                <td>
                  <button class="button update-button">更新</button>
              </form>
              </td>
              <td>
                <form action="/todo/delete" method="post">
                  @csrf
                  <button class="button delete-button" name="id" value="{{$item->id}}">削除</button>
                </form>
              </td>
            </tr>
            @endforeach
          @endif
        </table>
      </div>
    </div>
  </div>

</body>
</html>