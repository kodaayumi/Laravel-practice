<h1>新規投稿作成</h1>
<form action="{{ route('store.post') }}" method="post">
    @csrf
    <div>
    タイトル
        <input type="text" name="title" value="{{ old('title') }}">
        @error('title')
            <div class="error" style="color: red;">{{ $message }}</div>
        @enderror
    </div>
    <div>
    投稿者
        <select name="author_id">
            <option value="">選択してください</option>
            @foreach ($authors as $author)
                <option value="{{ $author->id }}" {{ old('author_id') == $author->id ? 'selected' : '' }}>
                    {{ $author->author_name }}
                </option>
            @endforeach
        </select>
        @error('author_id')
            <div class="error" style="color: red;">{{ $message }}</div>
        @enderror
    </div>
    <div>
    <textarea name="content" cols="30" rows="10">{{ old('content') }}</textarea>
        @error('content')
            <div class="error" style="color: red;">{{ $message }}</div>
        @enderror
    </div>
    <input type="submit" value="投稿">
</form>

