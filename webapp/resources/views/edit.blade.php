<h1>編集画面</h1>
<form action="{{ route('regist.edit', ['id' => $post->id]) }}" method="post">
    @csrf
    <div>
        タイトル
        <input type="text" name="title" value="{{ $post->title }}">
    </div>
    <div>
        投稿者
        <select name="author_id">
            <option value="">選択してください</option>
            @foreach ($authors as $author)
                <option value="{{ $author->id }}" {{ $author->id == $post->author_id ? 'selected' : '' }}>
                    {{ $author->author_name }}
                </option>
            @endforeach
        </select>
    </div>
    <div>
        本文
        <textarea name="content" cols="30" rows="10">{{ $post->content }}</textarea>
    </div>
    <input type="submit" value="更新">
</form>