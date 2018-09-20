<!-- 1.モーダル表示用ボタン -->
<button class="btn btn-primary" data-toggle="modal" data-target="#upd-confirmation">
    {{ __('dailyactions.Update') }}
</button>

<!-- 2.モーダル配置 -->
<div class="modal fade" id="upd-confirmation" tabindex="-1">
    <div class="modal-dialog"> 
        <!-- 3.モーダルコンテンツ -->
        <div class="modal-content">
            <!-- 4.モーダルヘッダ -->
            <div class="modal-header">
                <h4 class="modal-title" id="modal-label">確認</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- 5.モーダルボディ -->
            <div class="modal-body">
                更新してもよろしいですか？
            </div>
            <!-- 6.モーダルフッタ -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                <form style="display:inline" action="{{ url($table.'/'.$id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-primary">
                        {{ __('dailyactions.Update') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
