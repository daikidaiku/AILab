<p>{{$selected_first_keyword}}>{{$selected_second_keyword}}>{{$selected_third_keyword}}</p>
<form action="/{{$selected_first_keyword}}/{{$selected_second_keyword}}/{{$selected_third_keyword}}" method="post">
    @csrf
    <input type="hidden" name="first_keyword" value="{{$selected_first_keyword}}">
    <input type="hidden" name="second_keyword" value="{{$selected_second_keyword}}">
    <input type="hidden" name="third_keyword" value="{{$selected_third_keyword}}">
    <input type="text" name="last_keyword" placeholder="最後のキーワードを入力">
    <button type="submit">送信</button>
</form>