<div class="form-check">
    <input class="form-check-input" type="radio" name="{{$name}}"
           value="{{$value}}" @if($checked) checked @endif>
    <label class="form-check-label mr-4">
        {{ __($lable) }}
    </label>
</div>




{{--<form action="#" method="post" class="d-flex flex-row">--}}
{{--    @csrf--}}
{{--    <div class="form-check">--}}
{{--        <input class="form-check-input" type="radio" name="status"--}}
{{--               value="active"--}}
{{--               @if($user->status == 1) checked @endif>--}}
{{--        <label class="form-check-label mr-4">--}}
{{--            {{ __('فـعال') }}--}}
{{--        </label>--}}
{{--    </div>--}}
{{--    <div class="form-check">--}}
{{--        <input class="form-check-input" type="radio" name="status"--}}
{{--               value="deactive">--}}
{{--        <label class="form-check-label mr-4">--}}
{{--            {{ __('غـیرفـعال') }}--}}
{{--        </label>--}}
{{--    </div>--}}
{{--    <button type="submit" class="badge btn-outline-info">--}}
{{--        {{ __('✓') }}--}}
{{--    </button>--}}
{{--</form>--}}

