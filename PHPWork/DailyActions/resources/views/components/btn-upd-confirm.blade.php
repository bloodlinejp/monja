<!-- 1.モーダル表示用ボタン -->
<a id="{{ $btnid or 'upd-btn' }}" class="btn {{ $btn or 'btn-primary' }}" data-toggle="modal" data-target="#upd-confirmation" href="#">
    {{ $text or __('dailyactions.Update') }}
</a>

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
                {{ $text or __('dailyactions.Update')}}{{ __('dailyactions.Confirm') }}
            </div>
            <!-- 6.モーダルフッタ -->
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">{{ __('dailyactions.Close') }}</button>
                <button type="submit" class="btn btn-primary">{{ $text or __('dailyactions.Update') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
