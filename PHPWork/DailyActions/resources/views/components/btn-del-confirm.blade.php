<!-- 1.モーダル表示のためのボタン -->
<button class="btn btn-danger" data-toggle="modal" data-target="#del-confirmation">
    {{ __('actionitems.Delete') }}
</button>

<!-- 2.モーダルの配置 -->
<div class="modal" id="del-confirmation" tabindex="-1">
    <div class="modal-dialog"> 
        <!-- 3.モーダルのコンテンツ -->
        <div class="modal-content">
            <!-- 4.モーダルのヘッダ -->
            <div class="modal-header">
                <h4 class="modal-title" id="modal-label">確認ダイアログ</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- 5.モーダルのボディ -->
            <div class="modal-body">
                削除してよろしいですか？
            </div>
            <!-- 6.モーダルのフッタ -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                <form style="display:inline" action="{{ url($table.'/'.$id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        {{ __('actionitems.Delete') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
