<h1>編集画面</h1>
<form action="{{ route('regist.edit', ['id' => $post->id]) }}" method="post">
    @csrf
    <div>
    タイトル
        <input type="text" name="title" value="{{ old('title', $post->title) }}">
        @error('title')
            <div class="error" style="color: red;">{{ $message }}</div>
        @enderror
    </div>
    <div>
    投稿者
        <select name="author_id">
            <option value="">選択してください</option>
            @foreach ($authors as $author)
                <option value="{{ $author->id }}" {{ old('author_id', $post->author_id) == $author->id ? 'selected' : '' }}>
                    {{ $author->author_name }}
                </option>
            @endforeach
        </select>
        @error('author_id')
            <div class="error" style="color: red;">{{ $message }}</div>
        @enderror
    </div>
    <div>
    本文
        <textarea name="content" cols="30" rows="10">{{ old('content', $post->content) }}</textarea>
        @error('content')
            <div class="error" style="color: red;">{{ $message }}</div>
        @enderror
    </div>
    <input type="submit" value="更新">
</form>