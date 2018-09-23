<!-- 1.モーダル表示用ボタン -->
<button class="btn btn-danger" data-toggle="modal" data-target="#del-confirmation">
    {{ __('dailyactions.Delete') }}
</button>

<!-- 2.モーダル配置 -->
<div class="modal fade" id="del-confirmation" tabindex="-1">
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
                {{ __('dailyactions.Delete') }}{{ __('dailyactions.Confirm') }}
            </div>
            <!-- 6.モーダルフッタ -->
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">{{ __('dailyactions.Close') }}</button>
                <form style="display:inline" action="{{ url($table.'/'.$id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        {{ __('dailyactions.Delete') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
