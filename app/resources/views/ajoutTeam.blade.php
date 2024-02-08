<h2>{{__('page.haddt')}} {{ $team->name }}</h2>
    <form action="{{ route('processForm') }}" method="POST">
    @csrf
    <input type="hidden" name="team" value="{{ $team->id }}">
    <label for="member">{{__('page.login')}} :</label>
    <select name="member" id="member">
        @foreach($otherUsers as $otherUser)
            <option value="{{ $otherUser->id }}">{{ $otherUser->name }}</option>
        @endforeach
    </select>

    <button type="submit">{{ __('page.submit') }}</button>
</form>
<a href="/"><button>{{__('page./') }}</button></a>
