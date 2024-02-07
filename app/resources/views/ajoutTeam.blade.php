<h2>Ajout membre a la team : {{ $team->name }}</h2>
    <form action="{{ route('processForm') }}" method="POST">
    @csrf
    <input type="hidden" name="team" value="{{ $team->id }}">
    <label for="member">Membre :</label>
    <select name="member" id="member">
        @foreach($otherUsers as $otherUser)
            <option value="{{ $otherUser->id }}">{{ $otherUser->name }}</option>
        @endforeach
    </select>

    <button type="submit">Soumettre</button>
</form>
