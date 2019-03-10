<form style="display:inline" action="{{ url($table.'/'.$id) }}" method="post">
    @csrf
    <!-- 動詞DELETEを設定 -->
    <!-- ルートはusers.destroyになる -->
    @method('DELETE')
    <button type="submit" class="btn btn-danger">
        {{ __('Delete') }}
    </button>
</form>